<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Stagaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreateMeeting;
use App\Http\Controllers\Controller;
use App\Models\Token;
use MacsiDigital\Zoom\Facades\Zoom;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class MeetingController extends Controller
{

    public function test(){
        $query = http_build_query([
            'response_type' => 'code',
            'client_id' => env('ZOOM_CLIENT_ID'),
            'redirect_uri' => env('ZOOM_REDIRECT_URI'),
            'state' => 'your_state_parameter',
        ]);

        return redirect('https://zoom.us/oauth/authorize?' . $query);
    }
    public function handleZoomCallback(Request $request)
    {

        $code = $request->get('code');

        $client = new Client();

        $response = $client->post('https://zoom.us/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => env('ZOOM_CLIENT_ID'),
                'client_secret' => env('ZOOM_CLIENT_SECRET'),
                'code' => $code,
                'redirect_uri' => env('ZOOM_REDIRECT_URI'),
            ],
        ]);

    
        $responseData = json_decode((string) $response->getBody(), true);
        $accessToken = $responseData['access_token'];
        $refreshToken = $responseData['refresh_token'];

       Token::create([
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
        ]);

        return $accessToken . " " . $refreshToken;
    }

    public function refreshZoomAccessToken()
    {
        $lastToken =Token::latest()->first();

        if (!$lastToken) {
            throw new \Exception("No Zoom token found.");
        }
        $refreshToken = $lastToken->refresh_token;

        $client = new Client();

        $response = $client->post('https://zoom.us/oauth/token', [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
                'client_id' => env('ZOOM_CLIENT_ID'),
                'client_secret' => env('ZOOM_CLIENT_SECRET'),
            ],
        ]);

        $responseData = json_decode((string) $response->getBody(), true);
        $newAccessToken = $responseData['access_token'];

        $lastToken->update(['access_token' => $newAccessToken]);
        return $newAccessToken;
    }
    public function createMeeting($request){
        $accessToken = $this->refreshZoomAccessToken();

        if (!$accessToken) {
            throw new \Exception("Access token is missing or invalid.");
        }

        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ];

        $meetingData = [
            'topic' => $request->topic,
            'duration' => $request->duration,
            'start_time' => $request->start_time,
            'timezone' => config('zoom.timezone'),
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://api.zoom.us/v2/users/me/meetings', [
            'headers' => $headers,
            'json' => $meetingData,
        ]);

        if ($response->getStatusCode() === 201) {
            $responseData = json_decode($response->getBody(), true);
            return $responseData;
        } else {
            throw new \Exception("Failed to create meeting. Error code: " . $response->getStatusCode());
        }


    }

    public function index()
    {
        $online_classes = Meeting::where('created_by',auth()->user('employes')->email)->get();

        return view('pages.online_Meetings.index', compact('online_classes'));
    }

    
    public function create()
    {
        $Stagaires = Stagaire::join('projects', 'stagaires.id', '=', 'projects.Stagaire_id')
        ->join('employes', 'projects.Employe_id', '=', 'employes.id')
        ->where('employes.id', auth()->user()->id)->select('stagaires.*')->distinct()
        ->get();
    
    return view('pages.online_Meetings.add', compact('Stagaires'));
    }
    public function Meetings(){
        $user=auth('stagaire')->user()->id;
        $meetings=Meeting::where('Stagaire_id',$user)
        ->whereRaw('DATE_ADD(start_at, INTERVAL duration SECOND) > NOW()')
        ->get();
        $not_ids = DB::table('notifications')
        ->where('type', 'App\Notifications\CreateMeeting')
        ->where('notifiable_id', auth('stagaire')->user()->id)
        ->pluck('id');
    
    DB::table('notifications')
        ->whereIn('id', $not_ids)
        ->update(['read_at' => now()]);
    
        return view('pages.Stagaire.Meetings', compact('meetings'));
     
    }

   
    public function store(Request $request)
    {
        try {
            if (strtotime($request->start_time) <= strtotime('now')) {
                return redirect()->back()->withErrors(['error' => 'The meeting date must be in the future.']);
            }
            $meeting = $this->createMeeting($request);

            Meeting::create([
                'integration' => true,
                'Stagaire_id' => $request->Stagaire_id,
                'created_by' => auth()->user('employes')->email,
                'meeting_id' => $meeting['id'],
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration, 
                'password' => $meeting['password'],
                'start_url' => $meeting['start_url'], 
                'join_url' => $meeting['join_url'], 
            ]);
            $user = Stagaire::find($request->Stagaire_id);
              
            Notification::send($user, new CreateMeeting());
            return redirect()->route('online_classes.index')->with('message','Your meeting has been successfully created!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Invalid duration. Please enter a valid duration in the correct format.']);
        }
    }

    
    public function show(Meeting $meeting)
    {
        //
    }

    
    public function edit(Meeting $meeting)
    {
        //
    }

    
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    
    public function destroy(Request $request)
    {
        try {

            $info = Meeting::find($request->id);

            
                Meeting::destroy($request->id);
            return redirect()->route('online_classes.index')->with('message','Your meeting has been successfully deleted!');
       
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}

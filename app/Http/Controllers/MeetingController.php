<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Stagaire;
use Illuminate\Http\Request;
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

        // Demander un jeton d'accès en échange du code d'autorisation
        $response = $client->post('https://zoom.us/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => env('ZOOM_CLIENT_ID'),
                'client_secret' => env('ZOOM_CLIENT_SECRET'),
                'code' => $code,
                'redirect_uri' => env('ZOOM_REDIRECT_URI'),
            ],
        ]);

        // Extraire le jeton d'accès et le jeton de rafraîchissement de la réponse
        $responseData = json_decode((string) $response->getBody(), true);
        $accessToken = $responseData['access_token'];
        $refreshToken = $responseData['refresh_token'];

        // Stocker le jeton d'accès et le jeton de rafraîchissement en session pour une utilisation ultérieure
       Token::create([
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
        ]);

        // Rediriger l'utilisateur vers une autre page ou effectuer d'autres actions
        return $accessToken . " " . $refreshToken;
    }

    public function refreshZoomAccessToken()
    {
        $lastToken =Token::latest()->first();

        if (!$lastToken) {
            throw new \Exception("No Zoom token found.");
        }
        // Récupérer le jeton de rafraîchissement de la session
        $refreshToken = $lastToken->refresh_token;

        $client = new Client();

        // Demander un nouveau jeton d'accès en utilisant le jeton de rafraîchissement
        $response = $client->post('https://zoom.us/oauth/token', [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
                'client_id' => env('ZOOM_CLIENT_ID'),
                'client_secret' => env('ZOOM_CLIENT_SECRET'),
            ],
        ]);

        // Extraire le nouveau jeton d'accès de la réponse
        $responseData = json_decode((string) $response->getBody(), true);
        $newAccessToken = $responseData['access_token'];

        $lastToken->update(['access_token' => $newAccessToken]);
        return $newAccessToken;
    }
    public function createMeeting($request){
        $accessToken = $this->refreshZoomAccessToken();

        // Assurez-vous que vous avez un jeton d'accès valide avant de procéder
        if (!$accessToken) {
            throw new \Exception("Access token is missing or invalid.");
        }

        // Utilisez le jeton d'accès dans les en-têtes de la demande
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ];

        // Données de la réunion
        $meetingData = [
            'topic' => $request->topic,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_time' => $request->start_time,
            'timezone' => config('zoom.timezone'),
        ];

        // Effectuez la demande pour créer une réunion en utilisant l'API Zoom
        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://api.zoom.us/v2/users/me/meetings', [
            'headers' => $headers,
            'json' => $meetingData,
        ]);

        // Traitez la réponse de l'API Zoom
        if ($response->getStatusCode() === 201) {
            $responseData = json_decode($response->getBody(), true);
            // Traitez les données de la réunion créée comme nécessaire
            return $responseData;
        } else {
            throw new \Exception("Failed to create meeting. Error code: " . $response->getStatusCode());
        }


    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $online_classes = Meeting::where('created_by',auth()->user('employes')->email)->get();
        return view('pages.online_Meetings.index', compact('online_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('pages.Stagaire.Meetings', compact('meetings'));
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $meeting = $this->createMeeting($request);

            Meeting::create([
                'integration' => true,
                'Stagaire_id' => $request->Stagaire_id,
                'created_by' => auth()->user('employes')->email,
                'meeting_id' => $meeting['id'], // Utilisez l'ID de réunion de la réponse
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration, // Utilisez la durée de la demande
                'password' => $meeting['password'],
                'start_url' => $meeting['start_url'], // Utilisez l'URL de démarrage de la réponse
                'join_url' => $meeting['join_url'], // Utilisez l'URL de rejoindre de la réponse
            ]);

            //toastr()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {

            $info = Meeting::find($request->id);

            if($info->integration == true){

                $apiKey = env('ZOOM_CLIENT_ID');
                $apiSecret = env('ZOOM_CLIENT_SECRET');
                $meetingId =$request->meeting_id;
               // return $meetingId;
                $accessToken = $this->refreshZoomAccessToken();
                //return $accessToken;
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accessToken,
                ])->delete("https://api.zoom.us/v2/meetings/{$meetingId}");
               

               // online_classe::where('meeting_id', $request->id)->delete();
                Meeting::destroy($request->id);
            }
            else{
               // Meeting::where('meeting_id', $request->id)->delete();
                Meeting::destroy($request->id);
            }

            //toastr()->success(trans('messages.Delete'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}

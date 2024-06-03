<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TestimonialController extends Controller
{
    
    public function index()
    {
        $user = auth('stagaire')->user();
        $testimonial = Testimonial::where('Stagaire_id', $user->id)
        ->with('Stagaire')
        ->latest() 
        ->first();
        return view('pages.Stagaire.testimonial', compact('testimonial'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $user = auth('stagaire')->user();
        $request->validate([
            'testimonial' => 'required|string',
        ]);
    
        $testimonial = new Testimonial();
        $testimonial->testimonial = $request->input('testimonial');
        $testimonial->Stagaire_id =$user->id;
        $testimonial->save();
    
        return redirect()->route('certificat')->with('success', 'Your testimonial has been submitted successfully!');
    }

   
    public function show(Testimonial $testimonial)
    {
        //
    }

    
    public function edit(Testimonial $testimonial)
    {
        //dash
    }

    public function update(Request $request)
    {
        $user = auth('stagaire')->user();
    
        $request->validate([
            'testimonial' => 'required|string', 
        ]);
    
        $testimonial = Testimonial::where('Stagaire_id', $user->id)->first();
    
        if (!$testimonial) {
            return redirect()->route('testimonials.index')->with('error', 'No testimonial found for this user!');
        }
    
        $testimonial->testimonial = $request->testimonial;
    
        $testimonial->save();
    
        return redirect()->route('Testimonial.index')->with('success', 'Your testimonial has been modified successfully!');
    }
    


   
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}

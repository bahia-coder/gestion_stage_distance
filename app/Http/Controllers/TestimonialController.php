<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('stagaire')->user();
        $testimonial = Testimonial::where('Stagaire_id', $user->id)
        ->with('Stagaire')
        ->latest() // Trie par date de création décroissante
        ->first();

        

        return view('pages.Stagaire.testimonial', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth('stagaire')->user();
        $request->validate([
            'testimonial' => 'required|string', // Exemple de règle de validation
        ]);
    
        $testimonial = new Testimonial();
        $testimonial->testimonial = $request->input('testimonial');
        $testimonial->Stagaire_id =$user->id;
        $testimonial->save();
    
        return redirect()->route('certificat')->with('success', 'Your testimonial has been submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth('stagaire')->user();
    
        $request->validate([
            'testimonial' => 'required|string', // Exemple de règle de validation
        ]);
    
        // Récupérer le testimonial du stagiaire
        $testimonial = Testimonial::where('Stagaire_id', $user->id)->first();
    
        // Vérifier si le testimonial existe
        if (!$testimonial) {
            return redirect()->route('testimonials.index')->with('error', 'No testimonial found for this user!');
        }
    
        // Mettre à jour le contenu du testimonial
        $testimonial->testimonial = $request->testimonial;
    
        $testimonial->save();
    
        return redirect()->route('Testimonial.index')->with('success', 'Your testimonial has been modified successfully!');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}

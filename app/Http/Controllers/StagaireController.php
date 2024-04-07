<?php

namespace App\Http\Controllers;

use App\Models\Stagaire;
use Illuminate\Http\Request;

class StagaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return('hii');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stagaire  $stagaire
     * @return \Illuminate\Http\Response
     */
    public function show(Stagaire $stagaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stagaire  $stagaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Stagaire $stagaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stagaire  $stagaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stagaire $stagaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stagaire  $stagaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stagaire $stagaire)
    {
        //
    }
}

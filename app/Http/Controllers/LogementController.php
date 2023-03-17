<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use App\Models\Terrain;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logements = Logement::orderBy("id", "desc")->paginate(5);
        return view('logement.logement', compact('logements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terrains = Terrain::all();
        return view('logement.createLogement', compact('terrains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "num_logement" => "required",
            "type_vente" => 'required',
            "prix_logement" => 'required',
            "terrain_id" => 'required',
        ]);

        $logement = new Logement($validateData);

        $logement->save();
        return redirect()->route('logement')->with('success', "Logement a été créée avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function show(Logement $logement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function edit(Logement $logement)
    {
        $terrains = Terrain::all();
        return view('logement.updateLogement', compact('logement', 'terrains'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logement $logement)
    {
        $validateData = $request->validate([
            "num_logement" => "required",
            "type_vente" => 'required',
            "prix_logement" => 'required',
            "terrain_id" => 'required',
        ]);

        $logement->update($validateData);
        return redirect()->route('logement')->with('success', "Logement a été mettre à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logement $logement)
    {
        $logement->delete();
        return redirect()->route('logement')->with('success', "Logement '$logement->num_logement' a été supprimer avec succès");
    }
}

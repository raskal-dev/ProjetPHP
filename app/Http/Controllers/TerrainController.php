<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\Terrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TerrainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terrains = Terrain::orderBy("id", "desc")->paginate(5);
        return view('terrain.terrain', compact('terrains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cites = Cite::all();
        return view('terrain.createTerrain', compact('cites'));
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
            'superficie_terrain' => 'required',
            'nom_terrain' => 'required',
            'cite_id' => 'required'
        ]);

        $terrain = new Terrain($validateData);
        $terrain->save();
        return redirect()->route('terrain')->with('success', "Le terrain a été ajouter avec success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function show(Terrain $terrain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function edit(Terrain $terrain)
    {
        $cites = Cite::all();
        return view('terrain.updateTerrain', compact('terrain', 'cites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terrain $terrain)
    {
        $validateData = $request->validate([
            'superficie_terrain' => 'required',
            'nom_terrain' => 'required',
            'cite_id' => 'required'
        ]);

        $terrain->update($validateData);
        return redirect()->route('terrain')->with('success', 'Le terrain a été mettre à jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terrain $terrain)
    {
        if (DB::table('logements')->where('terrain_id', $terrain->id)->exists()) {
            return redirect()->route('terrain')->with('errordelete', "Le cité '$terrain->nom_terrain' ne peut pas être supprimer car il est encore attaché à un Logement");
        } else {
            // Supprimer le cité de la base de données
            $terrain->delete();

            // Rediriger l'utilisateur vers la liste des agences avec un message de confirmation
            return redirect()->route('terrain')->with('success', "Le terrain '$terrain->nom_terrain' a été supprimer avec success");
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Cite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CiteController extends Controller
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
        $cites = Cite::orderBy("id", "desc")->paginate(5);
        return view('cite.cite', compact('cites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agences = Agence::all();
        return view('cite.createCite', compact('agences'));
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
            'libelle_cite' => 'required|string|max:255',
            'adresse_cite' => 'required|string|max:255',
            'code_postal_cite' => 'required|string|max:255',
            'agence_id' => 'required|string|max:255'
        ]);

        $cite = new Cite($validateData);

        $cite->save();

        return redirect()->route('cite')->with('success', 'La cité a été ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function show(Cite $cite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function edit(Cite $cite)
    {
        $agences = Agence::all();
        return view('cite.updateCite', compact('cite', 'agences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cite $cite)
    {
        $validateData = $request->validate([
            'libelle_cite' => 'required|string|max:255',
            'adresse_cite' => 'required|string|max:255',
            'code_postal_cite' => 'required|string|max:255',
            'agence_id' => 'required|string|max:255'
        ]);

        $cite->update($validateData);
        return redirect()->route('cite')->with('success', 'La cité a été mettre à jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cite $cite)
    {
        if (DB::table('terrains')->where('cite_id', $cite->id)->exists()) {
            return redirect()->route('cite')->with('errordelete', "Le cité '$cite->libelle_cite' ne peut pas être supprimer car il est encore attaché à une Terrain");
        } else {
            // Supprimer le cité de la base de données
            $cite->delete();

            // Rediriger l'utilisateur vers la liste des agences avec un message de confirmation
            return redirect()->route('cite')->with('success', "La cité '$cite->libelle_cite' a été supprimer avec success");
        }
    }
}

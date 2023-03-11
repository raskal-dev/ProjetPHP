<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;

class AgenceController extends Controller
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
        $agence = Agence::orderBy("id", "desc")->get();
        return view('agence.agence');
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
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'labelle_agence' => 'required|string|max:255',
            'adresse_agence' => 'required|string|max:255',
            'tel_agence' => 'required|string|max:20',
        ]);

        // Créer une nouvelle instance de l'agence avec les données validées
        $agence = new Agence($validatedData);

        // Enregistrer l'agence dans la base de données
        $agence->save();

        // Rediriger l'utilisateur vers la page de la nouvelle agence avec un message de confirmation
        return redirect()->route('agence.agence', $agence)->with('success', 'L\'agence a été créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show(Agence $agence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit(Agence $agence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agence $agence)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'labelle_agence' => 'required|string|max:255',
            'adresse_agence' => 'required|string|max:255',
            'tel_agence' => 'required|string|max:20',
        ]);

        // Mettre à jour l'agence avec les nouvelles données
        $agence->update($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agence $agence)
    {
        // Vérifier si l'utilisateur est autorisé à supprimer cette agence
        $this->authorize('delete', $agence);

        // Supprimer l'agence de la base de données
        $agence->delete();

        // Rediriger l'utilisateur vers la liste des agences avec un message de confirmation
        return redirect()->route('agences.index')->with('success', 'L\'agence a été supprimée avec succès.');
    }
}

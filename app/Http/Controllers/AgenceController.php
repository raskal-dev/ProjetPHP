<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $agences = Agence::orderBy("id", "desc")->paginate(5);
        return view('agence.agence', compact('agences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agence.createagence');
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
            'libelle_agence' => 'required|string|max:255',
            'adresse_agence' => 'required|string|max:255',
            'tel_agence' => 'required|string|max:20',
        ]);

        // Créer une nouvelle instance de l'agence avec les données validées
        $agence = new Agence($validatedData);

        // Enregistrer l'agence dans la base de données
        $agence->save();

        // Rediriger l'utilisateur vers la page de la nouvelle agence avec un message de confirmation
        return redirect()->route('agence', $agence)->with('success', 'L\'agence a été créée avec succès.');
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
        return view('agence.updateagence', compact("agence"));
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
            'libelle_agence' => 'required|string|max:255',
            'adresse_agence' => 'required|string|max:255',
            'tel_agence' => 'required|string|max:20',
        ]);

        // Mettre à jour l'agence avec les nouvelles données
        $agence->update($validatedData);

        return redirect()->route('agence', $agence)->with('success', 'L\'agence a été mettre à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agence $agence)
    {
        if (DB::table('cites')->where('agence_id', $agence->id)->exists()) {
            return redirect()->route('agence')->with('errordelete', "L'agence '$agence->libelle_agence' ne peut pas être supprimer car il est encore attaché à une cité");
        } else {
            // Supprimer l'agence de la base de données
            $agence->delete();

            // Rediriger l'utilisateur vers la liste des agences avec un message de confirmation
            return redirect()->route('agence')->with('success', "L'agence '$agence->libelle_agence' a été supprimée avec succès.");
        }
    }
}

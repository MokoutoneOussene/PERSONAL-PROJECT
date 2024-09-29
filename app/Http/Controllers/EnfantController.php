<?php

namespace App\Http\Controllers;

use App\Models\Enfant;
use App\Models\Personnel;
use Illuminate\Http\Request;

class EnfantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // on doit compacter les données de la table personnel à la vue appelée d'ou compact('collection');
        $personnels = Personnel::all();
        $collection = Enfant::latest()->get();
        return view('pages.enfant.liste', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $collection = Personnel::latest()->get();
        return view('pages.enfant.ajouter', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Enfant::create($request->all());
        Enfant::create([
            
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_nais' => $request->date_nais,
            'lieu_nais' => $request->lieu_nais,
            'genre' => $request->genre,
            'nom_conj' => $request->nom_conj,
            'prenom_conj' => $request->prenom_conj,
            'profession' => $request->profession,
            'adresse' => $request->adresse,
            'acte_nais' => $request->acte_nais->store('actes_naissance_enfants', 'public'),
            'personnels_id' => $request->personnels_id,
        ]);

        emotify('success', 'enfant ajouté avec success !');
        return redirect()->back()->with('message', 'Enfant a été ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Personnel::find($id);
        $collection = Enfant::where('personnels_id', '=', $id)->get();
        return view('pages.enfant.details', compact('finds', 'collection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

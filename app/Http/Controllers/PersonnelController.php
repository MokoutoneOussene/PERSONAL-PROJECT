<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // on doit compacter les données de la table personnel à la vue appelée d'ou compact('collection')
        $collection = Personnel::latest()->get();
        return view('pages.personnel.liste', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.personnel.ajouter');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function perso_filter (Request $request)
    {
        $fonction = $request->fonction;

        $collection = Personnel::where('fonction', '=', $fonction)->get();

        return view('pages.personnel.liste', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Personnel::create([
            'matricule' => $request->matricule,
            'num_secu_social' => $request->num_secu_social,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_nais' => $request->date_nais,
            'residence' => $request->residence,
            'genre' => $request->genre,
            'date_embauche' => $request->date_embauche,
            'categorie' => $request->categorie,
            'telephone' => $request->telephone,
            'grou_sang' => $request->grou_sang,
            'pere' => $request->pere,
            'mere' => $request->mere,
            'perso_prevenir' => $request->perso_prevenir,
            'tele_perso_prevenir' => $request->tele_perso_prevenir,
            'lieunais' => $request->lieunais,
            'province' => $request->province,
            'matrimoniale' => $request->matrimoniale,
            'date_resiliation' => $request->date_resiliation,
            'fonction' => $request->fonction,
            'email' => $request->email,
            'contrat' => $request->contrat,
            'num_cnib' => $request->num_cnib,
            'date_cnib' => $request->date_cnib,
            'lieu_cnib' => $request->lieu_cnib,
            'nbre_enfant' => $request->nbre_enfant,
            'charge_uts' => $request->charge_uts,
            'photo' => $request->photo->store('photos_personnel', 'public'),
        ]);

        emotify('success', 'Agent ajouté avec success !');
        return redirect()->back()->with('message', 'Le personnel a été ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Personnel::find($id);
        return view('pages.personnel.detail', compact('finds'));

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

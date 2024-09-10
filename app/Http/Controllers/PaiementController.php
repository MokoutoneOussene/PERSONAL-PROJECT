<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contrat;
use App\Models\Occasionnelle;
use App\Models\Paiement;
use App\Models\Precompte;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Contrat::latest()->get();
        return view('pages.paiement.liste', compact('collection'));
    }

    /**
     * Display a listing of the resource.
     */
    public function liste_paie()
    {
        $collection = Paiement::latest()->get();
        $total = $collection->sum('salaire_total');
        return view('pages.paiement.liste_paie', compact('collection', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Paiement::create($request->all());

        emotify('success', 'Paiement effectué avec success !');
        return redirect()->route('gestion_paiement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Paiement::find($id);
        return view('pages.paiement.detail', compact('finds'));
    }

    /**
     * Display the specified resource.
     */
    public function generation(string $id)
    {
        $finds = Contrat::find($id);
        $occasionelle = Occasionnelle::where('contrats_id', '=', $id)->where('statut', '=', 'En Cours')->get();
        $precomptes = Precompte::where('contrats_id', '=', $id)->where('statut', '=', 'En Cours')->get();

        $occasionelle_collection = Occasionnelle::where('contrats_id', '=', $id)->get();
        $precomptes_collection = Precompte::where('contrats_id', '=', $id)->get();

        return view('pages.paiement.generation', compact('finds', 'occasionelle', 'precomptes', 'occasionelle_collection', 'precomptes_collection'));
    }

    /**
     * Display the specified resource.
     */
    public function Gener_groupe()
    {
        $collection = Contrat::latest()->get();
        return view('pages.paiement.generation_groupe', compact('collection'));
    }

    /**
     * Display the specified resource.
     */
    public function print_bulletin(string $id)
    {
        $finds = Paiement::find($id);
        return view('pages.paiement.bulletin', compact('finds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function date_filter(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;

        $collection = Paiement::whereDate('created_at', '>=', $date_debut)->whereDate('created_at', '<=', $date_fin)->get();
        $total = $collection->sum('salaire_total');

        return view('pages.paiement.liste_paie', compact('collection', 'total'));
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

<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Personnel;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // on doit compacter les données de la table personnel à la vue appelée d'ou compact('collection')
        $collection = Contrat::latest()->get();
        $personnels = Personnel::all();
        return view('pages.contrat.liste', compact('collection', 'personnels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personnels = Personnel::all();
        return view('pages.contrat.engagement', compact('personnels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Contrat::create($request->all());

        emotify('success', 'Contract ajouté avec success !');
        return redirect()->route('gestion_contrat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Contrat::find($id);
        return view('pages.contrat.detail', compact('finds'));
    }

    /**
     * Display the specified resource.
     */
    public function print(string $id)
    {
        $finds = Contrat::find($id);
        return view('pages.contrat.impression', compact('finds'));
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

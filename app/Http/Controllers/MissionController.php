<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Personnel;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // on doit compacter les données de la table personnel à la vue appelée d'ou compact('collection')
       $collection = Mission::latest()->get();
       $personnels = Personnel::latest()->get();
       return view('pages.mission.liste', compact('collection', 'personnels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personnels = Personnel::latest()->get();
        return view('pages.mission.ajouter', compact('personnels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validation des données
    $request->validate([
        'code' => 'nullable|string',
        'lib' => 'nullable|string',
        'consigne' => 'nullable|string',
        'date_signature' => 'required|date',
        'lieu' => 'nullable|string',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date',
        'personnels' => 'nullable|array',
    ]);

    $mission = new Mission();
    $mission->code = $request->code;
    $mission->lib = $request->lib;
    $mission->consigne = $request->consigne;
    $mission->date_signature = $request->date_signature;
    $mission->lieu = $request->lieu;
    $mission->date_debut = $request->date_debut;
    $mission->date_fin = $request->date_fin;
    $mission->save();

    if ($request->personnel_ids) {
        $personnelIds = $request->personnel_ids;
        $roles = $request->roles;
        $tasks = $request->tasks;

        foreach ($personnelIds as $index => $personnelId) {
            // Vérifiez si l'index existe dans les autres tableaux
            if (isset($roles[$index]) && isset($tasks[$index])) {
                $mission->personnels()->attach($personnelId, [
                    'role' => $roles[$index],
                    'task' => $tasks[$index]
                ]);
            }
        }
    }

    emotify('success', 'Mission ajoutée avec success !');
    return redirect()->route('gestion_mission.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Mission::find($id);
        return view('pages.mission.detail', compact('finds'));
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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Occasionnelle;
use Illuminate\Http\Request;

class OccasionnelleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        Occasionnelle::create($request->all());

        emotify('success', 'Charge occasionnelle effectué avec success !');
        return redirect()->back()->with('message', 'Charge occasionnelle effectué avec success !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Occasionnelle::find($id);
        return view('pages.generation.detail_occasionnelle', compact('finds'));
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

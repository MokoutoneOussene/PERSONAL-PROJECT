<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IstitutBank;
use Illuminate\Http\Request;

class InstitutBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = IstitutBank::latest()->get();
        return view('pages.institut_bank.institut_bank', compact('collection'));
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
        IstitutBank::create($request->all());

        emotify('success', 'Institut banquaire enregistrée avec success !');
        return redirect()->back()->with('message', 'Institut banquaire enregistrée avec success !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

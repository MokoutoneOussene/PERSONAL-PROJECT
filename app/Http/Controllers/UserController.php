<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = User::latest()->get();
        return view('pages.users.liste', compact('collection'));
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
        User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        emotify('success', 'Utilisateur ajouté avec success !');
        return redirect()->back()->with('message', 'L\'utilisateur a été ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = User::find($id);
        return view('pages.users.detail', compact('finds'));
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
        $use = User::find($id);
        $use->delete();

        emotify('error', 'Utilisateur supprimé avec success !');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function change_password(Request $request, string $id)
    {
        $finds = User::find($id);
        $finds->update([
            'password' => Hash::make($request->password),
        ]);

        emotify('success', 'Mot de passe changé avec success !');
        return redirect()->back()->with('message', 'Le mot de passe a été changé avec succès !');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profil_image(Request $request, string $id)
    {
        $finds = User::find($id);
        $finds->update([
            'photo' => $request->photo->store('photos_users', 'public'),
        ]);

        emotify('success', 'Photo du profile ajoutée avec success !');
        return redirect()->back()->with('message', 'La photo a été changée avec succès !');
    }
}

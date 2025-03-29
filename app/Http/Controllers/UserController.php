<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Méthode pour afficher le formulaire de création d'un utilisateur.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Méthode pour créer un nouvel utilisateur. 
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(2)->max(20)->letters()->mixedCase()->numbers()],
        ]);

        // Création de l'utilisateur
        $user = new User();
        // Remplir les attributs de l'objet User avec les données de la requête
        $user->fill($request->all());
        // Enregistrer l'utilisateur dans la base de données
        $user->save(); 
        
        return redirect(route('accueil'))->with('success', __('utilisateur_ajoute_succes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

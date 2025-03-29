<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Méthode pour afficher le formulaire de connexion
     */
    public function create()
    {
        // Affichage de la page de connexion
        return view('auth.create');
    }

    /**
     * Méthode pour se connecter à l'application 
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        // Récupération des données
        $credentials = $request->only('email', 'password'); 
        // Authentification de l'utilisateur
        if(!Auth::validate($credentials)){
            return redirect(route('login'))->withErrors(trans('auth.failed'))->withInput();
        }
        // Récupération de l'utilisateur
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        // Connexion de l'utilisateur
        Auth::login($user);
        // Redirection vers la page d'accueil
        return redirect()->intended(route('accueil'))->withSuccess(trans('auth.loginSuccess'));
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
     * Méthode pour se déconnecter de l'application 
     */
    public function destroy()
    {
        // Suppression des données de la session
        Session::flush();
        // Déconnexion de l'utilisateur
        Auth::logout();
        // Redirection vers la page de connexion
        return redirect(route('login'));
    }
}

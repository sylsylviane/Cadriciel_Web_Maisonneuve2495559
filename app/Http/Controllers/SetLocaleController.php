<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetLocaleController extends Controller
{
    public function setLocale($locale){
        // Vérifier si la langue est supportée
        if (! in_array($locale, ['fr', 'en'])){
            abort(400);
        }
        // On stocke la langue dans la session de l'utilisateur
        session()->put('locale', $locale);
        // On redirige l'utilisateur vers la page précédente
        return back();
    }
}

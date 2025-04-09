<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class FichierController extends Controller
{
    /**
     * Méthode pour afficher la liste des fichiers.
     */
    public function index()
    {
        $fichiers = Fichier::select()->orderby('title')->paginate(4);
        // dd($fichiers->items());
        return view('file.index', ['fichiers' => $fichiers]);
    }

    /**
     * Méthode pour afficher le formulaire de création d'un fichier.
     */
    public function create()
    {
        $fichiers = Fichier::titles();
        return view('file.create', compact('fichiers'));
    }

    /**
     * Méthode pour stocker un nouveau fichier dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|string|max:30',
            'title_en' => 'nullable|max:30',
            'file_path' => 'required|file|mimes:pdf,doc,zip|extensions:pdf,doc,zip|max:2048', // Validation du fichier
        ]);
        $fichierTitle = [
            'fr' => $request->title_fr, 
        ];
        if ($request->title_en != null) {
            $fichierTitle = $fichierTitle + ['en' => $request->title_en];
        }
        $file = $request->file_path;
        $link_file = $file->store('files', 'public'); // Enregistrer le fichier dans le dossier public/files

        // Créer le fichier
        $fichier = Fichier::create([
            'title' => $fichierTitle, 
            'user_id' => Auth::user()->id,
            'file_path' => $link_file, // Chemin du fichier
        ]); 

        return redirect()->route('file.show', $fichier->id)->with('success', 'Fichier créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fichier $fichier)
    {
        // dd($fichier);
        return view('file.show', ['fichier' => $fichier]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fichier $fichier)
    {
        return view('file.edit', ['fichier' => $fichier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fichier $fichier)
    {
        $request->validate([
            'title_fr' => 'required|string|max:30',
            'title_en' => 'nullable|max:30',
            'file_path' => 'required|file|mimes:pdf,doc,zip|extensions:pdf,doc,zip|max:2048', // Validation du fichier
        ]);
        $fichierTitle = [
            'fr' => $request->title_fr,
        ];
        if ($request->title_en != null) {
            $fichierTitle = $fichierTitle + ['en' => $request->title_en];
        }
        $file = $request->file_path;
        $link_file = $file->store('files', 'public'); // Enregistrer le fichier dans le dossier public/files

        // Supprimer l'ancien fichier
        if ($fichier->file_path){
            Storage::disk('public')->delete($fichier->file_path);
        }

        // Mettre à jour le fichier
        $fichier->update([
            'title' => $fichierTitle, 
            'user_id' => Auth::user()->id,
            'file_path' => $link_file, // Chemin du fichier
        ]);
        return redirect()->route('file.show', $fichier->id)->with('success', 'Fichier mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fichier $fichier)
    {
        // Supprimer le fichier du dossier public/files
        if ($fichier->file_path) {
            Storage::disk('public')->delete($fichier->file_path);
        }
        $fichier->delete();
        return redirect()->route('file.index')->with('success', 'Fichier supprimé avec succès.');
    }
}

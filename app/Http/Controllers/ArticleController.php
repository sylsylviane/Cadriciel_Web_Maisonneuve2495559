<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Méthode pour afficher la liste des articles.
     */
    public function index()
    {
        $articles = Article::select()->orderby('title')->paginate(10);
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Méthode pour afficher le formulaire de création d'un article.
     */
    public function create()
    {
        $articles = Article::articles();
        return view('article.create', compact('articles'));
    }

    /**
     * Méthode pour stocker un nouvel article dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|string|max:30',
            'title_en' => 'nullable|max:30',
            'content_fr' => 'required|max:191',
            'content_en' => 'nullable|max:191',
        ]);

        // Créer un tableau pour le titre et le contenu de l'article
        $articleTitle = [
            'fr' => $request->title_fr,
        ];
        $articleContent = [
            'fr' => $request->content_fr,
        ];
        // Vérifier si les champs en anglais sont remplis
        if ($request->title_en != null) {
                $articleTitle = $articleTitle + ['en' => $request->title_en];    
            }
        if ($request->content_en != null) {
                $articleContent = $articleContent + ['en' => $request->content_en]; 
        };

        // Créer l'article
        $article = Article::create([ // Article::create() est une méthode Eloquent pour créer un nouvel enregistrement dans la base de données
            'title' => $articleTitle, 
            'content' => $articleContent, 
            'user_id' => Auth::user()->id 
        ]);
        return redirect()->route('article.show', $article->id)->with('success', __('article_ajoute_succes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title_fr' => 'required|string|max:30',
            'title_en' => 'nullable|max:30',
            'content_fr' => 'required|max:191',
            'content_en' => 'nullable|max:191',
        ]);

        // Créer un tableau pour le titre et le contenu de l'article
        $articleTitle = [
            'fr' => $request->title_fr,
        ];
        $articleContent = [
            'fr' => $request->content_fr,
        ];
        // Vérifier si les champs en anglais sont remplis
        if ($request->title_en != null) {
            $articleTitle = $articleTitle + ['en' => $request->title_en];
        }
        if ($request->content_en != null) {
            $articleContent = $articleContent + ['en' => $request->content_en];
        };

        $article->update([
            'title' => $articleTitle,
            'content' => $articleContent,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('article.show', $article->id)->with('success', __('article_modifie_succes'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', __('article_supprime_succes'));
    }
}

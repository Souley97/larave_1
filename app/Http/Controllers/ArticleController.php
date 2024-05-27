<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{

    public function index(){
       $articles = Article::all();
       return view('articles/index', compact('articles'));
    }



public function create() {
    return view('articles.create');

}
public function store(Request $request)
{
    // Validation des champs de la requête
    $request->validate([
        'nom' => 'required',
        'description' => 'required',
        'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Initialisation de la variable pour le chemin de l'image
    $image = null;

    // Vérifier si un fichier image est uploadé
    if ($request->hasFile('image')) {
        // Stocker l'image dans le répertoire 'public/blog'
        $chemin_image = $request->file('image')->store('public/blog');

        // Vérifier si le chemin de l'image est bien généré
        if (!$chemin_image) {
            return redirect()->back()->with('error', 'Erreur lors du téléchargement de l\'image.');
        }

        // Récupérer le nom du fichier de l'image
        $image = basename($chemin_image);
    }

    // Créer un nouvel article
    $article = new Article();
    $article->nom = $request->nom;
    $article->description = $request->description;
    $article->image = $image; // Nom du fichier de l'image
    $article->save();

    return redirect()->route('article.index')
                     ->with('success', 'Article créé avec succès.');
}


public function edit($id)
{

    $article = Article::findOrFail($id);

    return view('articles.edit', compact('article'));

}


/**
 * Enregistre la modification dans la base de données
 */
public function update(Request $request, $id)
{

    $request->validate([

        'nom'=>'required',
        'description'=> 'required',
        'image' => '',

    ]);




    $contact = Article::findOrFail($id);
    $contact->nom = $request->get('nom');
    $contact->description = $request->get('description');
    $contact->image = $request->get('image');


    $contact->update();

    return redirect('/articles')->with('success', 'Article Modifié avec succès');

}

public function show($id)
{

    $article = article::findOrFail($id);
    return view('articles.details', compact('article'));

}

public function destroy($id)
{

    $article = article::findOrFail($id);
    $article->delete();

    return redirect('/articles')->with('success', 'article Supprime avec succès');

}


}

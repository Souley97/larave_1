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
    $request->validate([
        'nom' => 'required',
        'description' => 'required',
        'image' => '|image|mimes:jpeg,png,jpg,PNG,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        foreach ($request->photos as $photo) {
            $filename = 'img-'.time().'.'.$photo->getClientOriginalExtension();
            $photo->storeAs('public/photos/',$filename);
            Article::create([
                'filename' => $filename
            ]);
        }
    }
    Article::create($request->all());

        return redirect()->route('article.index')
                         ->with('success', 'Post created successfully.');

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

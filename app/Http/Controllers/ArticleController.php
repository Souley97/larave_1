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
    // public function details($id)
    // {

    //     $article = new Article::findOrFail($id);
    //     return view('articles/details', compact('article'));
        
    // }

    public function show(Article $article): View
    {

        return view('articles.details', compact('article'));
     }   

public function create() {
    return view('articles.create');

}
public function store(Request $request)
{
    $request->validate([
        'nom' => 'required',
        'description' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,PNG,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $request['image'] = $imageName;
    }
    Article::create($request->all());

        return redirect()->route('article.index')
                         ->with('success', 'Post created successfully.');

}
}

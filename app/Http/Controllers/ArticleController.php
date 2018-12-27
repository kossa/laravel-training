<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::recherche(10)->with('user', 'tags')->paginate(50);

        return view('articles.index', ['articles' => $articles]);
    }

    public function store()
    {
        Article::insert([
            'name' => 'mon article',
            'body' => 'lorem ipsum',
            'user_id' => 1
        ]);
        return "Article ajouté";
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function update()
    {
        Article::where('id', 2)
            ->update([
                'name' => 'name updated'
            ]);

        return 'article modifié';
    }

    public function destroy()
    {
        // Article::where('id', 2)->delete();
        Article::destroy(3);
        return "Article supprimé";
    }
}

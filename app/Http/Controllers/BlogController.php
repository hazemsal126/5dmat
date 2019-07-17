<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function index(Request $request)
    {
        $articles = \App\Models\Article::orderBy('id', 'desc')->paginate(15);
        $data = [
            "articles" => $articles
        ];
        return view("home.blog.index")->with($data);
    }
    public function blog(Request $request, $id)
    {
        $article = \App\Models\Article::find($id);
        $tags = $article->tags;
        $related = [];
        if (empty($tags)) {
            $related = \App\Models\Article::where('id', '<>', $id)
                ->orderBy('id', 'desc')
                ->limit(5)
                ->get();
            // dd($related);
        } else {
            $tagsIds = $tags->pluck('id');

            $related = \App\Models\Article::where('id', '<>', $id)
                ->whereIn('id', $tagsIds)
                ->limit(5)
                ->get();
        }
        // dd($tags);
        $data = [
            "article" => $article,
            "related" => $related
        ];

        return view("home.blog.blog")->with($data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class RatingController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        $articles_view = collect($articles);

        $articles_view = $articles_view->filter(function($value, $key) {
            return $value->isPublished();
        })->sortBy('likes_count')->values()->all();

        return view('rating.index', ['articles' => $articles_view]);
    }
}

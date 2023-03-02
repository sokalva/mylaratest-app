<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
//        $articles = Article::latest()->take(6)->get();
        $articles = Article::with('tags', 'state')->take(6)->get();
//        $articles = Article::latest()->get();
        return view('app.home', compact('articles'));
    }
}

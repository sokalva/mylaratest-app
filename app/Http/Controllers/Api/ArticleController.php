<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;

    }

    public function show(Request $request) {
//        $article = Article::with('comments', 'tags', 'state')->first();
//        $article = Article::with('comments', 'tags', 'state')->findOrFail(4);

//        $slug = $request->get('slug');
//        $article = Article::findBySlug($slug);
        $article = $this->service->getArticleBySlug($request);

        return new ArticleResource($article);
//        return response()->json($article);
    }

    public function viewsIncrement(Request $request) {
        $slug = $request->get('slug');
        $article = Article::findBySlug($slug);

        $article->state->increment('views');
        return new ArticleResource($article);
    }

    public function likesIncrement(Request $request) {
        $slug = $request->get('slug');
        $article = Article::findBySlug($slug);

        $inc = $request->get('increment');
        $inc ? $article->state->increment('likes') : $article->state->decrement('likes');
        return new ArticleResource($article);

    }

}

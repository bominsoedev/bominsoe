<?php

namespace App\Service;

use App\Models\Article;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ArticleService
{
    public function index()
    {
        $articles = Article::where('user_id', auth()->id())->with(['category', 'author'])->orderBy('id', 'desc')->get();
        return Inertia::render('Article/Index', [
            'articles' => $articles
        ]);
    }

    public function lists()
    {
        $articles = Article::where('user_id', auth()->id())->with(['category', 'author'])->orderBy('id', 'desc')->get();
        return Inertia::render('Article/ArticleList', [
            'articles' => $articles
        ]);
    }

    public function create($category)
    {
        return Inertia::render('Article/create', [
            'categories' => $category->where('user_id', auth()->id())->get()
        ])->with('message', 'Hello စမ်းကြည့်တာပါ');
    }

    public function store($request, $article, $articleCategories)
    {
        try {
            DB::beginTransaction();
            $article_param = [
                'uuid' => Str::uuid()->toString(),
                'title' => $request->article_title,
                'slug' => Str::slug($request->article_title),
                'excerpt' => Str::words($request->article_body, 15),
                'body' => $request->article_body,
                'user_id' => auth()->id(),
            ];
            $articleStore = $article->create($article_param);
            $categories = $request->article_category_id;
            foreach ($categories as $c) {
                $articleCategories->create([
                    'uuid' => Str::uuid()->toString(),
                    'article_id' => $articleStore->id,
                    'category_id' => $c,
                ]);
            }
            return 'success';
        } catch (QueryException $queryException) {
            dd($queryException);
        }
    }

    public function edit($article, $category)
    {
        return Inertia::render('Article/edit', [
            'article' => $article,
            'categories' => $category->where('user_id', auth()->id())->get()
        ]);
    }
}

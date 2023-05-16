<?php

namespace App\Service;

use App\Models\Article;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ArticleService
{
    public function index()
    {
        $articles = Article::latest()->filter(request(['search', 'category', 'author']))->where('user_id', auth()->id())->orderBy('id', 'desc')->get();
        return Inertia::render('Article/Index', [
            'articles' => $articles
        ]);
    }

    public function lists()
    {
        $articles = Article::latest()->filter(request(['search', 'category', 'author']))->where('user_id', auth()->id())->orderBy('id', 'desc')->get();
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

    public function store($request, $article, $articleCategories, $attachment)
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
            $attachment_file = $request->attachment;
            if ($attachment_file) {
                $request->validate([
                    'attachment' => 'image|mimes:png,jpg,gif,jpeg|max:2048'
                ]);
                $unique_name = uniqid() . "_articleAttachmentPhoto_" . $request->file('attachment')->getClientOriginalName();
                $org_name = $request->file('attachment')->getClientOriginalName();
                $extension = $request->file('attachment')->extension();
                $path = 'public/ArticleAttachment/';
                $attachment_param = [
                    'uuid' => Str::uuid()->toString(),
                    'article_id' => $articleStore->id,
                    'org_name' => $org_name,
                    'unique_name' => $unique_name,
                    'extension' => $extension,
                    'path' => $path

                ];
                $attachment_file->storeAs($path, $unique_name);
                $attachment->create($attachment_param);
            }
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

    public function show($article)
    {
        //        dd($article);
        return Inertia::render('Article', [
            'article' => $article,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}

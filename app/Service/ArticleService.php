<?php

namespace App\Service;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class ArticleService
{
    public function index(): Response
    {
        $articles = Article::latest()
            ->with([
                'reactions:id,uuid,article_id',
                'category:uuid,name,slug',
                'tag:uuid,name,slug',
                'author:id,uuid,username,photo',
                'article_photo:id,uuid,unique_name,article_id',
                'comments_count'
            ])
            ->filter(request(['search', 'category', 'author', 'tag']))
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->paginate(51)->withQueryString();
        return Inertia::render('Article/Index', [
            'articles' => $articles,
            'filters' => Request::only('search')
        ]);
    }

    public function lists(): Response
    {
        $articles = Article::latest()
            ->with(['category:uuid,name,slug', 'tag:uuid,name,slug', 'author:id,uuid,username'])
            ->filter(request(['search', 'category', 'author', 'tag']))
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->paginate(50)
            ->withQueryString();
        return Inertia::render('Article/ArticleList', [
            'articles' => $articles
        ]);
    }

    public function create($category, $tag): Response
    {
        return Inertia::render('Article/create', [
            'categories' => $category->where('user_id', auth()->id())->get(),
            "tags" => $tag->where('user_id', auth()->id())->get()
        ]);
    }

    public function store($request, $article, $articleCategories, $attachment, $articleTag): string|null
    {
        try {
            DB::beginTransaction();
            $article_param = [
                'uuid' => Str::uuid()->toString(),
                'title' => $request->article_title,
                'slug' => Str::slug($request->article_title),
                'form_frameworks' => $request->form_frameworks,
                'gradient_left' => $request->gradient_left,
                'article_create_date' => now(),
                'is_public' => $request->is_public,
                'description' => $request->description,
                'excerpt' => Str::words($request->article_body, 30, '.....'),
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
                    'user_id' => auth()->id(),
                    'article_id' => $articleStore->id,
                    'org_name' => $org_name,
                    'unique_name' => $unique_name,
                    'extension' => $extension,
                    'path' => $path,
                    'status' => 'article_photo'
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

            $tags = $request->article_tag_id;
            foreach ($tags as $t) {
                $articleTag->create([
                    'uuid' => Str::uuid()->toString(),
                    'article_id' => $articleStore->id,
                    'tag_id' => $t,
                ]);
            }
            return 'success';
        } catch (QueryException $queryException) {
            dd($queryException);
        }
    }

    public function edit($article, $category): Response
    {
        return Inertia::render('Article/edit', [
            'article' => $article,
            'categories' => $category->where('user_id', auth()->id())->get(),
            'tags' => Tag::where('user_id', auth()->id())->get(),
        ]);
    }

    public function update($request, $article, $articleCategories, $attachment): string|null
    {
        try {
            DB::beginTransaction();
            $article_param = [
                'uuid' => Str::uuid()->toString(),
                'title' => $request->article_title,
                'slug' => Str::slug($request->article_title),
                'description' => $request->description,
                'excerpt' => Str::words($request->article_body, 30, '.....'),
                'body' => $request->article_body,
                'user_id' => auth()->id(),
            ];
            $article->update($article_param);

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
                    'user_id' => auth()->id(),
                    'article_id' => $article->id,
                    'org_name' => $org_name,
                    'unique_name' => $unique_name,
                    'extension' => $extension,
                    'path' => $path,
                    'status' => 'article_photo'
                ];
                $attachment_file->storeAs($path, $unique_name);
                $attachment->create($attachment_param);
            }
            $articleCategories->where('article_id', $article->id)->delete();
            $categories = $request->article_category_id;
            foreach ($categories as $c) {
                $articleCategories->create(
                    [
                        'uuid' => Str::uuid()->toString(),
                        'article_id' => $article->id,
                        'category_id' => $c,
                    ]
                );
            }
            ArticleTag::where('article_id', $article->id)->delete();
            $tags = $request->article_tag_id;
            foreach ($tags as $t) {
                ArticleTag::create([
                    'uuid' => Str::uuid()->toString(),
                    'article_id' => $article->id,
                    'tag_id' => $t,
                ]);
            }
            return 'success';
        } catch (QueryException $queryException) {
            return null;

        }
    }

    public function show($article): Response
    {
        $reacted = $article->reactionBy(request()->user());
        $liked_count = $article->reactions()->count();
        if ($article->user_id != auth()->id()) {
            $article->update([
                'visit_count' => $article->visit_count + 1
            ]);
        }
        return Inertia::render('Article/Article', [
            'article' => $article,
            'reacted' => $reacted,
            'reaction_count' => $liked_count,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
    public function destroy($article)
    {

        try {
            DB::beginTransaction();
            $article->delete();

            return 'success';
        } catch (QueryException $queryException) {
            dd($queryException);
        }

    }

    public function store_reaction($article, $reaction): string|null
    {
        try {
            DB::beginTransaction();
            $reaction->create([
                'uuid' => Str::uuid()->toString(),
                'article_id' => $article->id,
                'user_id' => auth()->id()
            ]);

            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function destroy_reaction($article, $reaction): string|null
    {
        try {
            DB::beginTransaction();
            request()->user()->reactions()->where('article_id', $article->id)->delete();

            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }
}

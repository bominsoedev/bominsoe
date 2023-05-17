<?php

namespace App\Service;

use App\Models\Comment;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CommentService
{
    public function store($request, $article)
    {
        try {
            DB::beginTransaction();
            $comment_param = [
                'uuid' => Str::uuid()->toString(),
                'article_id' => $article->id,
                'user_id' => \request()->user()->id,
                'body' => $request->comment
            ];
            $article->comments()->create($comment_param);
            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function edit($comment)
    {

        return Inertia::render('Arricle/ArticleCommentEdit', [
            'comment' => $comment
        ]);
    }
}

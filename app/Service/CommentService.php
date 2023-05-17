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
                'user_id' => auth()->id(),
                'body' => $request->comment
            ];
            $article->comments()->create($comment_param);
            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function update($request, $comment)
    {
        try {
            DB::beginTransaction();
            $comment_param = [
                'body' => $request->comment
            ];
            $comment->update($comment_param);
            return "success";
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function replies($request, $comment)
    {
        try {
            DB::beginTransaction();
            $comment_param = [
                'uuid' => Str::uuid()->toString(),
                'article_id' => $comment->article_id,
                'user_id' => auth()->id(),
                'parent_id' => $comment->id,
                'body' => $request->replies
            ];
            $comment->create($comment_param);
            return 'success';
        } catch (QueryException $queryException) {
            dd($queryException);
        }
    }
}

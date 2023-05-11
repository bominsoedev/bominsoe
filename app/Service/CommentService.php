<?php

namespace App\Service;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        }
        catch (QueryException $queryException){
            return null;
        }
    }

}

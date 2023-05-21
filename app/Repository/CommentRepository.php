<?php

namespace App\Repository;

use App\Service\CommentService;
use Illuminate\Support\Facades\DB;

class CommentRepository implements CommentInterface
{
    public $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store($request, $article)
    {
        $store = $this->commentService->store($request, $article);
        if (!is_null($store)) {
            DB::commit();

            return redirect()->back();
        } else {
            DB::rollBack();

            return redirect()->back();
        }
    }

    public function update($request, $comment)
    {
        $update = $this->commentService->update($request, $comment);
        if (!is_null($update)) {
            DB::commit();

            return redirect()->back()->with('message', 'Comment updated success.');
        } else {
            DB::rollBack();

            return redirect()->back()-> with('error', 'Something want wrong.');
        }
    }

    public function replies($request, $comment)
    {
        $replies = $this->commentService->replies($request, $comment);
        if (!is_null($replies)) {
            DB::commit();

            return redirect()->back()->with('message','Comment reply success.');
        } else {
            DB::rollBack();

            return redirect()->back()->with('error','Something want wrong.');
        }
    }
}

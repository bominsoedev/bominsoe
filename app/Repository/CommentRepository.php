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

            return  redirect()->back();
        }
    }

    public function edit($comment)
    {
        $edit = $this->commentService->edit($comment);
    }
}

<?php

namespace App\Repository;

interface CommentInterface
{
    public function store($request, $article);

    public function edit($comment);
}

<?php

namespace App\Repository;

interface CommentInterface
{
    public function store($request, $article);
}

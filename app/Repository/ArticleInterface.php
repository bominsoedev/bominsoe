<?php

namespace App\Repository;

interface ArticleInterface
{
    public function index();

    public function create($category);
}

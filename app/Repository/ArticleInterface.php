<?php

namespace App\Repository;

interface ArticleInterface
{
    public function index();
    public function lists();
    public function create($category);
    public function store($request, $article, $articleCategories, $attachment);
    public function edit($article, $category);
    public function show($article);
}

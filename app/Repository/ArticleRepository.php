<?php

namespace App\Repository;

use App\Service\ArticleService;

class ArticleRepository implements ArticleInterface
{
    public $articleService;
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        return $this->articleService->index();

    }

    public function create($category)
    {
        return $this->articleService->create($category);
    }
}

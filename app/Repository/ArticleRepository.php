<?php

namespace App\Repository;

use App\Service\ArticleService;
use Illuminate\Support\Facades\DB;

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

    }public function lists()
    {
        return $this->articleService->lists();

    }
    public function create($category)
    {
        return $this->articleService->create($category);
    }
    public function store($request, $article, $articleCategories)
    {
        $store = $this->articleService->store($request, $article, $articleCategories);
        if (!is_null($store)) {
            DB::commit();

            return redirect()->route('article.index');
        } else {
            DB::rollBack();

            return redirect()->route('article.index');
        }
    }
    public function edit($article, $category)
    {
        return $this->articleService->edit($article, $category);
    }
    public function show($article)
    {
        return $this->articleService->show($article);
    }

}

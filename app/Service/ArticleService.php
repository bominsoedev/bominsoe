<?php

namespace App\Service;

use Inertia\Inertia;

class ArticleService
{
    public function index()
    {
        return Inertia::render('Article/Index');
    }

    public function create($category)
    {
        return Inertia::render('Article/create', [
            'categories' => $category->all()
        ])->with('message', 'Hello စမ်းကြည့်တာပါ');
    }
}

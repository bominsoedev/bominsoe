<?php

namespace App\Service;

use App\Models\Category;
use Inertia\Inertia;

class CategoriesService
{
    public function index()
    {
        $categories = Category::all();
        return Inertia::render('Categories/Index',[
            'categories' => $categories
        ]);
    }
    public function create()
    {

    }
    public function store()
    {

    }
    public function show()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }

}

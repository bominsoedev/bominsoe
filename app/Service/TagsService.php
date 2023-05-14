<?php

namespace App\Service;

use App\Models\Tag;
use Inertia\Inertia;

class TagsService
{
    public function index()
    {
        $tags = Tag::where('user_id', auth()->id())->with(['user'])->get();

        return Inertia::render('Categories/TagIndex', [
            'tags' => $tags
        ]);
    }
}

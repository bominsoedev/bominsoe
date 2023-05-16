<?php

namespace App\Service;

use App\Models\Tag;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class TagsService
{
    public function index()
    {
        $tags = Tag::where('user_id', auth()->id())->with(['user'])->get();

        return Inertia::render('Categories/TagIndex', [
            'tags' => $tags
        ]);
    }

    public function store($request, $tag)
    {
        try {
            DB::beginTransaction();
            $tag_param =
                [
                    'uuid' => Str::uuid()->toString(),
                    'name' => $request->tag,
                    'slug' => Str::slug($request->tag),
                    'user_id' => auth()->id()
                ];
            $tag->create($tag_param);

            return "success";
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function edit($tag)
    {
        $tags = Tag::where('user_id', auth()->id())->with(['user'])->get();

        return Inertia::render('Categories/TagEdit', [
            'tags' => $tags,
            'tag' => $tag
        ]);
    }
    public function update($request, $tag)
    {
        try {
            DB::beginTransaction();
            $tag_param = [
                'name' => $request->tag,
                'slug' => Str::slug($request->tag),
            ];
            $tag->update($tag_param);

            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }
}

<?php

namespace App\Repository;

use App\Service\TagsService;

class TagsRepository implements TagsInterface
{
    public $tagsService;
    public function __construct(TagsService $tagsService)
    {
        $this->tagsService = $tagsService;
    }
    public function index()
    {
       return $this->tagsService->index();
    }
}

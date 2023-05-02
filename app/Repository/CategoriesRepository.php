<?php

namespace App\Repository;

use App\Service\CategoriesService;

class CategoriesRepository implements CategoriesInterface
{
    public $categoriesService;
    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }
    public function index()
    {
        return $this->categoriesService->index();
    }
    public function create()
    {
        // TODO: Implement create() method.
    }
    public function store()
    {
        // TODO: Implement store() method.
    }
    public function show()
    {
        // TODO: Implement show() method.
    }
    public function edit()
    {
        // TODO: Implement edit() method.
    }
    public function update()
    {
        // TODO: Implement update() method.
    }
    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}

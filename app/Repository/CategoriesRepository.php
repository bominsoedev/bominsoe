<?php

namespace App\Repository;

use App\Service\CategoriesService;
use Illuminate\Support\Facades\DB;

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

    public function store($request, $category)
    {
        $result = $this->categoriesService->store($request, $category);
        if (!is_null($result)) {
            DB::commit();

            return redirect()->back();
        } else {
            DB::rollBack();

            return redirect()->back();
        }
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function edit($category)
    {
        return $this->categoriesService->edit($category);
    }

    public function update($request, $category)
    {
        $result = $this->categoriesService->update($request, $category);
        if (!is_null($result)) {
            DB::commit();

            return redirect()->back();
        } else {
            DB::rollBack();

            return redirect()->back();
        }
    }

    public function destroy($category)
    {
        $destroy = $this->categoriesService->destroy($category);
        if (!is_null($destroy)) {
            DB::commit();

            return redirect()->back();
        } else {
            DB::rollBack();

            return redirect()->back();
        }
    }
}

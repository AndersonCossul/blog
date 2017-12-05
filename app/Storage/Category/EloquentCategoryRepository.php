<?php

namespace App\Storage\Category;

use App\Models\Category;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function store($request)
    {
        return Category::create($request);
    }

    public function update($request, $id)
    {
        $category = $this->find($id);
        $category->name = $request->name;
        return $category->save();
    }

    public function destroy($id)
    {
        // TODO
    }
}
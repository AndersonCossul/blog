<?php

namespace App\Storage\Category;

use Session;
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
        return Category::create($request->all());
    }

    public function update($request)
    {
        $category = $this->find($request->id);

        if ($category == null) {
            return false;
        }

        $category->name = $request->name;
        return $category->save();
    }

    public function destroy($id)
    {
        $category = $this->find($id);

        if ($category == null) {
            return false;
        }

        if (count($category->posts) > 0) {
            Session::flash('warning', 'This category has posts connected to it.');
            return false;
        }

        return $category->delete();
    }
}
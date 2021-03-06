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

    public function findTrashed($id)
    {
        return Category::withTrashed()->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return Category::create([
            'name'  => $request->name,
            'slug'  => str_slug($request->name)
        ]);
    }

    public function update($request)
    {
        $category = $this->find($request->id);

        if ($category == null) {
            return false;
        }

        $category->name = $request->name;
        $category->slug = str_slug($request->name);

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

    public function restore($id)
    {
        $category = $this->findTrashed($id);

        if ($category == null) {
            return false;
        }

        return $category->restore();
    }

    public function permanent_destroy($id)
    {
        $category = $this->findTrashed($id);

        if ($category == null) {
            return false;
        }

        return $category->forceDelete();
    }

    public function onlyTrashed()
    {
        return Category::onlyTrashed()->get();
    }
}
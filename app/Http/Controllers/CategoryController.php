<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage\Category\CategoryRepositoryInterface as Category;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        // TODO
    }

    public function create()
    {
        // TODO
    }

    public function store(Request $request)
    {
        return $this->category->create($request);
    }

    public function edit($id)
    {
        // TODO
    }

    public function update(Request $request, $id)
    {
        return $this->category->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->category->destroy($id);
    }
}

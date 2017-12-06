<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryFormRequest;
use App\Storage\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        // TODO
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CreateCategoryFormRequest $request)
    {
        $category = $this->category->store($request);

        if ($category == null) {
            Session::flash('error', 'Error on creating new category');
            return view()->back();
        } else {
            Session::flash('success', 'Successfully created category');
            return redirect(route('admin.dashboard'));
        }
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

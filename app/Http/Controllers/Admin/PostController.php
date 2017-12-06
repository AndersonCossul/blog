<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostFormRequest;
use App\Storage\Post\PostRepositoryInterface;
use App\Storage\Category\CategoryRepositoryInterface;

class PostController extends Controller
{
    private $post;
    private $category;

    public function __construct(PostRepositoryInterface $post, CategoryRepositoryInterface $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    public function index()
    {
        return view('admin.posts.home');
    }

    public function create()
    {
        $categories = $this->category->all();

        if (count($categories) == 0) {
            Session::flash('warning', 'Please, create a category first.');
            return route('admin.category.create');
        }

        return view('admin.posts.create', compact('categories'));
    }

    public function store(CreatePostFormRequest $request)
    {
        $post = $this->post->store($request);

        if ($post == null) {
            Session::flash('error', 'Failed to create new post');
            return view()->back();
        } else {
            Session::flash('success', 'Post created succesfully');
            return redirect(route('admin.dashboard'));
        }
    }

    public function edit($id)
    {
        return view('admin.posts.edit');
    }

    public function update(Request $request, $id)
    {
        return $this->post->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->post->destroy($id);
    }
}
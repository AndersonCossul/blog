<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequestCreate;
use App\Http\Requests\PostFormRequestUpdate;
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
        $posts = $this->post->all();
        return view('admin.posts.list', compact('posts'));
    }

    public function create()
    {
        $categories = $this->category->all();

        if (count($categories) == 0) {
            Session::flash('warning', 'Please, create a category first.');
            return redirect()->route('admin.category.create');
        }

        return view('admin.posts.create', compact('categories'));
    }

    public function store(PostFormRequestCreate $request)
    {
        $post = $this->post->store($request);

        if ($post == null) {
            Session::flash('error', 'Failed to create new post.');
            return redirect()->back();
        } else {
            Session::flash('success', 'Post created succesfully.');
            return redirect()->route('admin.posts');
        }
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        $categories = $this->category->all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(PostFormRequestUpdate $request)
    {
        $operation = $this->post->update($request);

        if ($operation) {
            Session::flash('success', 'Post edited succesfully.');
            return redirect()->route('admin.posts');
        } else {
            Session::flash('error', 'Failed to edit post.');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $operation = $this->post->destroy($id);

        if ($operation) {
            Session::flash('success', 'Post deleted succesfully.');
            return redirect()->route('admin.posts');
        } else {
            Session::flash('error', 'Failed to delete post.');
            return redirect()->back();
        }
    }
}
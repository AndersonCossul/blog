<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage\Post\PostRepositoryInterface as Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        return view('admin.posts.home');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        return $this->post->create($request);
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

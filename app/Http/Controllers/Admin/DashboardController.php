<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Storage\Category\CategoryRepositoryInterface;
use App\Storage\Post\PostRepositoryInterface;

class DashboardController extends Controller
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
        return view('admin.dashboard.home');
    }

    public function trash()
    {
        $posts = $this->post->onlyTrashed();
        $categories = $this->category->onlyTrashed();

        return view('admin.dashboard.trash.home', compact('posts', 'categories'));
    }
}

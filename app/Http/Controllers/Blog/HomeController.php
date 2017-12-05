<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('blog.home');
    }
}

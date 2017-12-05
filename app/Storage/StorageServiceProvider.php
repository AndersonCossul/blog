<?php

namespace App\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    public function register()
    {
        // category
        $this->app->bind(
            'App\Storage\Category\CategoryRepositoryInterface',
            'App\Storage\Category\EloquentCategoryRepository'
        );

        // post
        $this->app->bind(
            'App\Storage\Post\PostRepositoryInterface',
            'App\Storage\Post\EloquentPostRepository'
        );
    }
}
<?php

// all these routes are with namespace App\Controllers\Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {

    Route::get('/', [
        'uses'  => 'DashboardController@index',
        'as'    => 'dashboard'
    ]);





    // post
    Route::get('posts', [
        'uses'  => 'PostController@index',
        'as'    => 'posts'
    ]);

    Route::get('post/create', [
        'uses'  => 'PostController@create',
        'as'    => 'post.create'
    ]);

    Route::post('post/store', [
        'uses'  => 'PostController@store',
        'as'    => 'post.store'
    ]);

    Route::get('post/edit/{id}', [
        'uses'  => 'PostController@edit',
        'as'    => 'post.edit'
    ]);

    Route::post('post/update', [
        'uses'  => 'PostController@update',
        'as'    => 'post.update'
    ]);

    Route::get('post/delete/{id}', [
        'uses'  => 'PostController@destroy',
        'as'    => 'post.delete'
    ]);

    Route::get('post/restore/{id}', [
        'uses'  => 'PostController@restore',
        'as'    => 'post.restore'
    ]);

    Route::get('post/permanent-delete/{id}', [
        'uses'  => 'PostController@permanent_destroy',
        'as'    => 'post.permanent-delete'
    ]);





    // category
    Route::get('categories', [
        'uses'  => 'CategoryController@index',
        'as'    => 'categories'
    ]);
    Route::get('category/create', [
        'uses'  => 'CategoryController@create',
        'as'    => 'category.create'
    ]);

    Route::post('category/store', [
        'uses'  => 'CategoryController@store',
        'as'    => 'category.store'
    ]);

    Route::get('category/edit/{id}', [
        'uses'  => 'CategoryController@edit',
        'as'    => 'category.edit'
    ]);

    Route::post('category/update', [
        'uses'  => 'CategoryController@update',
        'as'    => 'category.update'
    ]);

    Route::get('category/delete/{id}', [
        'uses'  => 'CategoryController@permanent_destroy',
        'as'    => 'category.delete'
    ]);

    Route::get('category/restore/{id}', [
        'uses'  => 'CategoryController@restore',
        'as'    => 'category.restore'
    ]);

    Route::get('category/permanent-delete/{id}', [
        'uses'  => 'CategoryController@destroy',
        'as'    => 'category.permanent-delete'
    ]);






    Route::get('trash', [
        'uses'  => 'DashboardController@trash',
        'as'    => 'trash'
    ]);
});

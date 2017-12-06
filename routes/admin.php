<?php

// all these routes are with namespace App\Controllers\Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::get('/', [
        'uses'  => 'DashboardController@index',
        'as'    => 'dashboard'
    ]);

    // post
    Route::get('post/create', [
        'uses'  => 'PostController@create',
        'as'    => 'post.create'
    ]);

    Route::post('post/store', [
        'uses'  => 'PostController@store',
        'as'    => 'post.store'
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
        'uses'  => 'CategoryController@destroy',
        'as'    => 'category.delete'
    ]);
});

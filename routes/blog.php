<?php
Auth::routes();

// all these routes are with namespace App\Controllers\Blog

Route::get('/', 'HomeController@index')->name('home');

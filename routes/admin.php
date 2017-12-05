<?php

Route::get('post/create', [
    'uses'  => 'PostController@create',
    'as'    => 'post.create'
]);
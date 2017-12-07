@extends('admin.layout.master')
@section('content')

    <div class="panel panel-default admin-trash">
        <div class="panel-heading">
            <h3>Trash</h3>
        </div>

        <div class="panel-body">
            <ul class="nav nav-tabs">
                <li id="posts" class="active"><a href="javascript:void(0)">Posts</a></li>
                <li id="categories"><a href="javascript:void(0)">Categories</a></li>
            </ul>

            @include('admin.dashboard.trash.posts')
            @include('admin.dashboard.trash.categories')
        </div>
    </div>

@endsection
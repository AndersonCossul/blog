@extends('admin.layout.master')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Create new Post</h3>
        </div>

        <div class="panel-body">
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.posts.partials.form')
            </form>
        </div>
    </div>

@endsection
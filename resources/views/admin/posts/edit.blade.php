@extends('admin.layout.master')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Edit Post {{ $post->name }}</h3>
        </div>

        <div class="panel-body">
            <form action="{{ route('admin.post.update') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $post->id }}">
                @include ('admin.posts.partials.form')
            </form>
        </div>
    </div>

@endsection
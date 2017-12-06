@extends('admin.layout.master')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Edit Category {{ $category->name }}</h3>
        </div>

        <div class="panel-body">
            <form action="{{ route('admin.category.update') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $category->id }}">
                @include ('admin.categories.partials.form')
            </form>
        </div>
    </div>

@endsection
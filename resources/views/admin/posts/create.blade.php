@extends('admin.layout.master')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Create new Post</h3>
        </div>

        <div class="panel-body">
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <fieldset class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input name="title" type="text" required placeholder="Title" class="form-control" value="{{ old('title') }}">
                </fieldset>

                <fieldset class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" required>
                        <option disabled selected>Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="form-group {{ $errors->has('featured_image') ? ' has-error' : '' }}">
                    <label for="featured_image">Featured Image</label>
                    <input name="featured_image" type="file" class="form-control">
                </fieldset>

                <fieldset class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="content">Content</label>
                    <textarea name="content" required placeholder="Content" rows="5" class="form-control">{{ old('content') }}</textarea>
                </fieldset>

                <fieldset class="form-group">
                    <div class="text-center">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

@endsection
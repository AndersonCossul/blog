@extends('admin.layout.master')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Create new Post</h3>
        </div>

        <div class="panel-body">
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <fieldset class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" required placeholder="Title" class="form-control">
                </fieldset>

                <fieldset class="form-group">
                    <label for="featured_image">Featured Image</label>
                    <input name="featured_image" type="file" class="form-control">
                </fieldset>

                <fieldset class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" required placeholder="Content" class="form-control"></textarea>
                </fieldset>

                <fieldset class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control">
                        <option disabled selected>Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="form-group">
                    <input type="submit" value="Salvar" class="btn btn-success">
                </fieldset>
            </form>
        </div>
    </div>

@endsection
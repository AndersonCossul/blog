@extends('admin.layout.master')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Categories</h3>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>

                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                               class="btn btn-default btn-xs">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.category.delete', ['id' => $category->id]) }}"
                               class="btn btn-danger btn-xs">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
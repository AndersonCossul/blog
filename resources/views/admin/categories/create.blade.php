@extends('admin.layout.master')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Create new Category</h3>
        </div>

        <div class="panel-body">
            <form action="{{ route('admin.category.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" required placeholder="Name" class="form-control">
                </fieldset>

                <fieldset class="form-group">
                    <input type="submit" value="Salvar" class="btn btn-success">
                </fieldset>
            </form>
        </div>
    </div>

@endsection
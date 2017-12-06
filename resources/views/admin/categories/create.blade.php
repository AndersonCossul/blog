@extends('admin.layout.master')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Create new Category</h3>
        </div>

        <div class="panel-body">
            <form action="{{ route('admin.category.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>
                    <input name="name" type="text" required placeholder="Name" class="form-control" value="{{ old('name') }}">
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
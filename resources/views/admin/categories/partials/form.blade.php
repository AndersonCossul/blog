<fieldset class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name">Name</label>
    <input name="name" type="text" required placeholder="Name" class="form-control" value="{{ old('name') ?: @$category->name }}">
</fieldset>

<fieldset class="form-group">
    <div class="text-center">
        <input type="submit" value="Salvar" class="btn btn-success">
    </div>
</fieldset>
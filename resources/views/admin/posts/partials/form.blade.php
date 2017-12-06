<fieldset class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title">Title</label>
    <input name="title" type="text" required placeholder="Title" class="form-control"
           value="{{ old('title') ?: @$post->title }}">
</fieldset>

<fieldset class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
    <label for="category_id">Category</label>
    <select name="category_id" class="form-control" required>
        <option disabled selected>Select</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                    {{ (old('category_id') == $category->id || @$post->category_id == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</fieldset>

<fieldset class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
    <label for="content">Content</label>
    <textarea name="content" required placeholder="Content" rows="5"
              class="form-control">{{ old('content') ?: @$post->content }}</textarea>
</fieldset>

<fieldset class="form-group {{ $errors->has('featured_image') ? ' has-error' : '' }}">
    <label for="featured_image">Featured Image</label>
    @if (isset($post->featured_image))
        <hr>
        <img src="{{ asset('uploads/posts/' . $post->featured_image) }}" class="img-fluid">
        <hr>
        <span>Click to select a new one or leave it to keep the actual one.</span>
    @endif
    <input name="featured_image" type="file" class="form-control">
</fieldset>

<fieldset class="form-group">
    <div class="text-center">
        <input type="submit" value="Salvar" class="btn btn-success">
    </div>
</fieldset>
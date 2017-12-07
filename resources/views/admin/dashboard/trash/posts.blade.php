<table id="posts" class="table table-hover">
    <thead>
    <th>Image</th>
    <th>Title</th>
    <th>Content</th>
    <th>Category</th>
    <th>Restore</th>
    <th>Delete</th>
    </thead>

    <tbody>
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <tr>
                <td><img src="{{ $post->featured_image }}" width="100px" height="100px"></td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}"
                       class="btn btn-success btn-xs">Restore</a>
                </td>
                <td>
                    <a href="{{ route('admin.post.permanent-delete', ['id' => $post->id]) }}"
                       class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td>No posts.</td>
        </tr>
    @endif
    </tbody>
</table>
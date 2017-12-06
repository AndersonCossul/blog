<?php

namespace App\Storage\Post;

use App\Models\Post;

class EloquentPostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::all();
    }

    public function find($id)
    {
        return Post::find($id);
    }

    public function store($request)
    {
        return Post::create($request->all());
    }

    public function update($request)
    {
        $post = $this->find($request->id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        if ($request->featured_image) {
            $post->featured_image = $request->featured_image;
        }
        return $post->save();
    }

    public function destroy($id)
    {
        $post = $this->find($id);
        return $post->delete();
    }
}
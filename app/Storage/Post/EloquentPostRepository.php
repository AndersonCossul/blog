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
        $image = $request->featured_image;
        $new_image_name = time() . '-' . $image->getClientOriginalName();
        $image->move('uploads/posts', $new_image_name);

        return Post::create([
            'title'             => $request->title,
            'featured_image'    => $new_image_name,
            'category_id'       => $request->category_id,
            'content'           => $request->content
        ]);
    }

    public function update($request)
    {
        $post = $this->find($request->id);

        if ($post == null) {
            return false;
        }

        if ($request->featured_image) {
            $image = $request->featured_image;
            $new_image_name =  time() . '-' . str_slug($image->getClientOriginalName());
            $image->move('uploads/posts', $new_image_name);

            $post->featured_image = $new_image_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        return $post->save();
    }

    public function destroy($id)
    {
        $post = $this->find($id);

        if ($post == null) {
            return false;
        }

        unlink(public_path() . '/uploads/posts/' . $post->featured_image);
        return $post->delete();
    }
}
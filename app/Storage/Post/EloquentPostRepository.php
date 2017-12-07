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

    public function findTrashed($id)
    {
        return Post::withTrashed()->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        $image = $request->featured_image;
        $new_image_name = time() . '-' . $image->getClientOriginalName();
        $image->move('uploads/posts', $new_image_name);

        return Post::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'featured_image' => $new_image_name,
            'category_id' => $request->category_id,
            'content' => $request->content
        ]);
    }

    public function update($request)
    {
        $post = $this->find($request->id);

        if ($post == null) {
            return false;
        }

        if ($request->featured_image) {
            // delete old image
            // using getOriginal so it skips the acessor of getting the url instead of path
            $old_image_path = public_path() . '/uploads/posts/' . $post->getOriginal('featured_image');
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }

            // create new image
            $image = $request->featured_image;
            $new_image_name = time() . '-' . $image->getClientOriginalName();
            $image->move('uploads/posts', $new_image_name);

            $post->featured_image = $new_image_name;
        }

        $post->title = $request->title;
        $post->slug = str_slug($request->title);
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

        return $post->delete();
    }

    public function restore($id)
    {
        $post = $this->findTrashed($id);

        if ($post == null) {
            return false;
        }

        return $post->restore();
    }

    public function permanent_destroy($id)
    {
        $post = $this->findTrashed($id);

        if ($post == null) {
            return false;
        }

        // delete old image
        // using getOriginal so it skips the acessor of getting the url instead of path
        $old_image_path = public_path() . '/uploads/posts/' . $post->getOriginal('featured_image');
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        return $post->forceDelete();
    }

    public function onlyTrashed()
    {
        return Post::onlyTrashed()->get();
    }
}
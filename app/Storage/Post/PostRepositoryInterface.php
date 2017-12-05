<?php
namespace App\Storage\Post;

interface PostRepositoryInterface
{
    public function all();
    public function find($id);
    public function store($request);
    public function update($request, $id);
    public function destroy($id);
}
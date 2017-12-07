<?php

namespace App\Storage\Category;

interface CategoryRepositoryInterface
{
    public function all();
    public function find($id);
    public function store($request);
    public function update($request);
    public function destroy($id);
    public function onlyTrashed();
}
<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function index()
    {
        return Category::all();
    }

    public function store($validated)
    {
        return Category::create($validated);
    }

    public function update(Category $category, $validated)
    {
        return $category->update($validated);
    }

    public function destroy(Category $category)
    {
        $category->sub_category()->delete();
        return $category->delete();
    }
}

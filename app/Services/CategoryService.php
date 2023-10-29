<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function index()
    {
        return Category::query()->get();
    }

    public function store($validated)
    {
        return Category::query()->create($validated);
    }

    public function update(Category $category, $validated)
    {
        return $category->update($validated);
    }

    public function destroy(Category $category)
    {
        $category->subCategory()->delete();
        return $category->delete();
    }
}

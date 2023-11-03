<?php

namespace App\Services;

use App\Models\ParentCategory;

class ParentCategoryService
{
    public function index()
    {
        return ParentCategory::all();
    }

    public function store($validated)
    {
        return ParentCategory::create($validated);
    }

    public function update(ParentCategory $parentCategory, $validated)
    {
        return $parentCategory->update($validated);
    }

    public function destroy(ParentCategory $parentCategory)
    {
        $categories = $parentCategory->category()->get();
        foreach ($categories as $category){
            $category->sub_category()->delete();
        }
        $parentCategory->category()->delete();
        return $parentCategory->delete();
    }
}

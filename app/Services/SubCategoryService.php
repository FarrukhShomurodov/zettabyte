<?php

namespace App\Services;

use App\Models\SubCategory;

class SubCategoryService
{
    public function index()
    {
        return SubCategory::query()->get();
    }

    public function store($validated)
    {
        return SubCategory::query()->create($validated);
    }

    public function update(SubCategory $subCategory, $validated)
    {
        return $subCategory->update($validated);
    }

    public function destroy(SubCategory $subCategory)
    {
        return $subCategory->delete();
    }
}

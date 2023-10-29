<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): AnonymousResourceCollection
    {
        $categories = $this->categoryService->index();
        return CategoryResource::collection($categories);
    }

    public function store(CategoryRequest $request): CategoryResource
    {
        $category = $this->categoryService->store($request->validated());
        return CategoryResource::make($category);
    }

    public function update(Category $category, CategoryRequest $request): CategoryResource
    {
        $this->categoryService->update($category, $request->validated());
        return CategoryResource::make($category);
    }

    public function destroy(Category $category): \Illuminate\Foundation\Application|Response|Application|ResponseFactory
    {
        $this->categoryService->destroy($category);
        return response('category has been deleted', 404);
    }
}

<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentCategoryRequest;
use App\Http\Resources\ParentCategoryResource;
use App\Models\ParentCategory;
use App\Services\ParentCategoryService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ParentCategoryController extends Controller
{
    protected ParentCategoryService $parentCategoryService;

    public function __construct(ParentCategoryService $parentCategoryService)
    {
        $this->parentCategoryService = $parentCategoryService;
    }

    public function index(): AnonymousResourceCollection
    {
        $parentCategories = $this->parentCategoryService->index();
        return ParentCategoryResource::collection($parentCategories);
    }

    public function store(ParentCategoryRequest $request): ParentCategoryResource
    {
        $parentCategory = $this->parentCategoryService->store($request->validated());
        return ParentCategoryResource::make($parentCategory);
    }

    public function update(ParentCategory $parentCategory, ParentCategoryRequest $request): ParentCategoryResource
    {
        $this->parentCategoryService->update($parentCategory, $request->validated());
        return ParentCategoryResource::make($parentCategory);
    }

    public function destroy(ParentCategory $parentCategory): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $this->parentCategoryService->destroy($parentCategory);
        return response("parent category has been deleted", 400);
    }
}

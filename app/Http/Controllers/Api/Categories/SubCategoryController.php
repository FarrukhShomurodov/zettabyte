<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use App\Services\SubCategoryService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubCategoryController extends Controller
{
    protected SubCategoryService $subCategoryService;

    public function __construct(SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }

    public function index(): AnonymousResourceCollection
    {
        $subCategories = $this->subCategoryService->index();
        return SubCategoryResource::collection($subCategories);
    }

    public function store(SubCategoryRequest $request): SubCategoryResource
    {
        $subCategory = $this->subCategoryService->store($request->validated());
        return SubCategoryResource::make($subCategory);
    }

    public function update(SubCategory $subCategory, SubCategoryRequest $request): SubCategoryResource
    {
        $this->subCategoryService->update($subCategory, $request->validated());
        return SubCategoryResource::make($subCategory);
    }
    public function destroy(SubCategory $subCategory): void
    {
        $this->subCategoryService->destroy($subCategory);
        response('subCategory has been deleted', 404);
    }
}

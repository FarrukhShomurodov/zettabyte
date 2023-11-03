<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): AnonymousResourceCollection
    {
        $products = $this->productService->index();
        return ProductResource::collection($products);
    }

    public function store(ProductRequest $request): ProductResource
    {
        $product = $this->productService->store($request->validated());
        return ProductResource::make($product);
    }

    public function update(Product $product, ProductRequest $request): ProductResource
    {
        $this->productService->update($product, $request->validated());
        return ProductResource::make($product);
    }

    public function destroy(Product $product): \Illuminate\Foundation\Application|Response|Application|ResponseFactory
    {
        $this->productService->destroy($product);
        return response("product has been deleted", 400);
    }
}

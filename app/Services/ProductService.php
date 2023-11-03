<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function index()
    {
        return Product::all();
    }

    public function store($validated)
    {
        return Product::create($validated);
    }

    public function update(Product $product, $validated)
    {
        return $product->update($validated);
    }

    public function destroy(Product $product)
    {
        return $product->delete();
    }
}

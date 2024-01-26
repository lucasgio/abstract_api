<?php

namespace App\Http\Controllers\V1\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{

    private ProductService $productService;


    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->productService->getAllProducts();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validated();
        return $this->productService->createProduct($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->productService->getProductById($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->validated();
        return $this->productService->updateProduct($product,$request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        return $this->productService->deleteProduct($product);
    }
}

<?php

namespace App\Http\Controllers\V1\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use App\Traits\ApiResponse;
use App\Traits\InfoResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use InfoResponse,ApiResponse;
    private ProductService $productService;


    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = ProductResource::collection(Product::paginate(15));
        return $this->collectionDataResponse($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validated();
        $product = $this->productService->createProduct($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}

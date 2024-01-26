<?php


namespace App\Services;

use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Traits\ApiResponse;
use App\Traits\InfoResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductService
{

    use InfoResponse, ApiResponse;

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        $products = $this->productRepository->getAll();
        $this->collectionDataResponse(ProductResource::collection($products));
    }

    public function getProductById(Product $product)
    {
        $product = $this->productRepository->getById($product);
        return $this->singleDataResponse($this->resourceList(),ProductResource::make($product),Response::HTTP_OK);
    }

    public function createProduct(array $data)
    {
        $product = $this->productRepository->create($data);
        return $this->singleDataResponse($this->resourceSuccess(), ProductResource::make($product), Response::HTTP_CREATED);
    }

    public function updateProduct(Product $product, array $data)
    {
        $product = $this->productRepository->update($product, $data);
        return $this->singleDataResponse($this->resourceUpdate(), ProductResource::make($product), Response::HTTP_OK);
    }

    public function deleteProduct(Product $product)
    {
        return $this->singleDataResponse($this->resourceDelete(), ProductResource::make($this->productRepository->delete($product)), Response::HTTP_OK);
    }
}

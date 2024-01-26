<?php
namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::paginate(15);
    }

    public function getById(Product $product)
    {
        return Product::findOrFail($product->id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data)
    {
        $product = Product::findOrFail($product->id);
        $product->update($data);
        return $product;
    }

    public function delete(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $product->delete();
        return $product;
    }
}

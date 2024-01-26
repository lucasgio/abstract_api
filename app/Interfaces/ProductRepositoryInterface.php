<?php

namespace App\Interfaces;
use App\Models\Product;

interface ProductRepositoryInterface
{
    public function getAll();

    public function getById(Product $product);

    public function create(array $data);

    public function update(Product $product, array $data);

    public function delete(Product $product);
}

<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAllProducts($filters, $pagination = 10)
    {
        $query = Product::query();

        // Apply filters
        if (!empty($filters['sku'])) {
            $query->where('sku', $filters['sku']);
        }
        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }
        if (!empty($filters['category'])) {
            $query->where('category_id', $filters['category']);
        }

        return $query->paginate($pagination);
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // Soft delete
        return $product;
    }
}

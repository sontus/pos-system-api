<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['product_id', 'sku', 'name', 'category']);
        $products = $this->productService->getAllProducts($filters);
        return response()->json($products);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->productService->createProduct($request->validated());
        return response()->json($product, 201);
    }

    public function update(ProductRequest $request, $id)
    {

        $product = $this->productService->updateProduct($id, $request->validated());
        return response()->json($product);
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return response()->json(['message' => 'Product soft deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['name']);
        $categories = $this->categoryService->getAllCategories($filters);
        return response()->json($categories);
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->createCategory($request->validated());
        return response()->json($category, 201);
    }

    public function update(CategoryRequest $request, $id)
    {

        $category = $this->categoryService->updateCategory($id, $request->validated());
        return response()->json($category);
    }

    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return response()->json(['message' => 'Category soft deleted successfully']);
    }
}

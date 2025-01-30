<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getAllCategories($filters, $pagination = 10)
    {
        $query = Category::query();

        // Apply filters
        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }
        return $query->paginate($pagination);
    }

    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    public function updateCategory($id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete(); // Soft delete
        return $category;
    }
}

<?php

namespace App\Services;

use App\Models\Supplier;

class SupplierService
{

    // List Suppliers
    public function getAllSuppliers($filters, $pagination = 10)
    {
        $query = Supplier::query();

        // Apply filters
        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        return $query->paginate($pagination);
    }

    // Create Supplier
    public function createSupplier(array $data)
    {
        return Supplier::create($data);
    }

    // Update Supplier
    public function updateSupplier($id, array $data)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($data);
        return $supplier;
    }

    // Delete Supplier
    public function deleteSupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete(); // Soft delete
        return $supplier;
    }
}

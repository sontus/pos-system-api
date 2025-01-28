<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\SupplierRequest;
use Illuminate\Http\Request;
use App\Services\SupplierService;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    // List Suppliers
    public function index(Request $request)
    {
        $filters = $request->only(['name']);
        $suppliers = $this->supplierService->getAllSuppliers($filters);
        return response()->json($suppliers, 200);
    }

    // Create Supplier
    public function store(SupplierRequest $request)
    {
        $supplier = $this->supplierService->createSupplier($request->validated());
        return response()->json($supplier, 201);
    }

    // Update Supplier
    public function update(SupplierRequest $request, $id)
    {
        return $request;
        $supplier = $this->supplierService->updateSupplier($id, $request->validated());
        return response()->json($supplier);
    }

    // Delete Supplier
    public function destroy($id)
    {
        $this->supplierService->deleteSupplier($id);
        return response()->json(['message' => 'Supplier soft deleted successfully']);
    }
}


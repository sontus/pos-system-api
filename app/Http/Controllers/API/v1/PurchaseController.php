<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\PurchaseRequest;
use App\Services\PurchaseService;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    protected $purchaseService;

    public function __construct(PurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }

    public function store(PurchaseRequest $request)
    {
        $purchase = $this->purchaseService->createPurchase($request->validated());
        return response()->json($purchase, 201);
    }

    public function index(Request $request)
    {
        $filters = $request->only(['supplier_id','purchase_id']);
        $purchases = $this->purchaseService->listPurchases($filters);
        return response()->json($purchases);
    }



}

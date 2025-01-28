<?php
namespace App\Services;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Support\Facades\DB;

class PurchaseService
{
    // Create purchase
    public function createPurchase(array $data)
    {
        return DB::transaction(function () use ($data) {
            $purchase = Purchase::create([
                'supplier_id' => $data['supplier_id'],
                'purchase_date' => $data['purchase_date'],
                'total_amount' => 0, // Will be updated later
            ]);

            $totalAmount = 0;

            foreach ($data['items'] as $item) {
                $totalPrice = $item['quantity'] * $item['unit_price'];
                $totalAmount += $totalPrice;

                // Add purchase item
                PurchaseItem::create([
                    'purchase_id' => $purchase->purchase_id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $totalPrice,
                ]);

                // Update product stock
                $product = Product::findOrFail($item['product_id']);
                $product->current_stock_quantity += $item['quantity'];
                $product->save();
            }

            // Update total amount in purchase
            $purchase->update(['total_amount' => $totalAmount]);

            return $purchase;
        });
    }

    // List Purchases
    public function listPurchases($filters, $pagination = 10)
    {
        $query = Purchase::with(['items', 'supplier']);

        if (!empty($filters['supplier_id'])) {
            $query->where('supplier_id', $filters['supplier_id']);
        }

        return $query->paginate($pagination);
    }
}

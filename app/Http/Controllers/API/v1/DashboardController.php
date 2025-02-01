<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $products = Product::count();
        $suppliers = Supplier::count();
        $purchases = Purchase::count();
        $categories = Category::count();

        return response()->json([
            'products' => $products,
            'suppliers' => $suppliers,
            'purchases' => $purchases,
            'categories' => $categories,
        ]);

    }
}

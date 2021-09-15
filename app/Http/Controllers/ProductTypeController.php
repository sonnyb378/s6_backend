<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductType;

class ProductTypeController extends Controller
{
    public function vendor($product_type_id) {
        $producttype = ProductType::find($product_type_id);
        if ($producttype) {
            return $producttype->vendors;
        }
        return response()->json(["message" => "Product type does not exist"]);
    }
}

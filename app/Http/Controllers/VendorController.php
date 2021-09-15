<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vendor;
use App\Models\Product;
use Helper;

class VendorController extends Controller
{
    public function product_type($vendor_id) {
        $vendor = Vendor::find($vendor_id);
        if ($vendor) {
            return $vendor->product_type;
        }
        return response()->json(["message" => "Vendor does not exist"]);
    }

    public function orders($vendor_id) {
        $vendor = Vendor::find($vendor_id);
        if ($vendor) {   
            
            $helper = new Helper;
            $orders = $helper->render($vendor);
            
            if (!$orders) {
                return response()->json(["message" => "No orders exist for the vendor"]);
            } else {
                $data = [
                    "orders" => $orders,
                ];
                
                if (count($vendor->response) > 0) {
                    switch ($vendor->response[0]->name) {
                        case 'xml':
                            return response()->view('xml', ['data' => $data])->header("Content-Type", 'xml');
                            break;
                        default:
                            return response()->json([
                                "data" => $data
                            ]);
                            break;
                    }
                } else {
                    return response()->json([
                        "data" => $data
                    ]);
                }
                
            }

            
            
        
        }
        return response()->json(["message" => "Vendor does not exist"]);
    }
}

// {
//     "id": 12345,
//     "user_id": 1,
//     "first_name": "John",
//     "last_name": "Doe",
//     "address_1": "123 Main Street",
//     "address_2": null,
//     "city": "Santa Monica",
//     "state": "CA",
//     "postal_code": "90014",
//     "country": "US",
//     "created_at": "2021-06-08T00:00:00.000000Z",
//     "updated_at": "2021-06-08T00:00:00.000000Z",
//     "pivot": {
//         "vendor_id": 2,
//         "order_id": 12345,
//         "id": 45680,
//         "product_id": 14,
//         "quantity": 5
//     }
// }
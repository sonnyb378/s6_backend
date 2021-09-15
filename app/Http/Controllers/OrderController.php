<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Vendor;

class OrderController extends Controller
{
    public function user($order_id) {
        $order = Order::find($order_id);
        if ($order) {
            return $order->user;
        } 
        return response()->json(["message" => "Order ID does not exist"]);
    }

}

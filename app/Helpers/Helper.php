<?php

use App\Models\Product;

class Helper {

    function render($vendor) {

      $index_found = null;
      if (count($vendor->orders) > 0) {
          $orders = [];
          $print_line_items = [];
          $temp = [];
          
          foreach($vendor->orders as $order) {
              $line_items = [];
              $imagepath = Product::find($order->pivot->product_id)->creative->image_url;
              
              array_push($line_items, [
                  "external_order_line_item_id" => $order->pivot->id,
                  "product_id" => $order->pivot->product_id,
                  "quantity" => $order->pivot->quantity,
                  "image_url" => $imagepath
              ]); 
              
              if (count($orders) > 0) {                        
                  $index_found = array_search($order->id, array_values($orders));
                  $order_id_exists = in_array($order->id, $orders[$index_found]);
                  if ($order_id_exists) {
                      $temp = $orders[$index_found]['print_line_items'];
                      array_splice($orders, $index_found, 1);
                  }
              }

              // $order_id_exists = array_filter($orders, fn($k) => $k["external_order_id"] == $order->id);
              // if ($order_id_exists) {                       
              //     $index_found = array_search($order->id, array_values($order_id_exists[0]));
              //     $temp = $order_id_exists[0]['print_line_items'];                        
              //     if ($index_found !== null) {
              //         array_splice($orders, $index_found, 1);
              //     }
              // }

              $print_line_items = array_merge($line_items, $temp);                    
              
              array_push($orders, [
                  "external_order_id" => $order->id,
                  "buyer_first_name" => $order->first_name,
                  "buyer_last_name" => $order->last_name,
                  "buyer_shipping_address_1" => $order->address_1,
                  "buyer_shipping_address_2" => $order->address_2,
                  "buyer_shipping_city" => $order->city,
                  "buyer_shipping_state" => $order->state,
                  "buyer_shipping_postal" => $order->postal_code,
                  "buyer_shipping_country" => $order->country,
                  "print_line_items" => $print_line_items
              ]);

              
              
          }
          
      
      } else {
        return false;
          // return response()->json(["message" => "No orders exist for the vendor"]);
      }

    return $orders;
  }
  
}

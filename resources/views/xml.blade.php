<?xml version="1.0"?>
<orders>    
        @foreach ($data['orders'] as $order)
        <order>
        {!! $order['external_order_id'] ? "<order_number>".$order['external_order_id']."</order_number>" : "<order_number/>" !!}
        <customer_data>
            {!! $order['buyer_first_name'] ? "<first_name>".$order['buyer_first_name']."</first_name>" : "<first_name/>" !!}
            {!! $order['buyer_last_name'] ? "<last_name>".$order['buyer_last_name']."</last_name>" : "<last_name/>" !!}
            {!! $order['buyer_shipping_address_1'] ? "<address1>".$order['buyer_shipping_address_1']."</address1>" : "<address1/>" !!}
            {!! $order['buyer_shipping_address_2'] ? "<address2>".$order['buyer_shipping_address_2']."</address2>" : "<address2/>" !!}
            {!! $order['buyer_shipping_city'] ? "<city>". $order['buyer_shipping_city']."</city>" : "<city/>" !!}
            {!! $order['buyer_shipping_state'] ? "<state>".$order['buyer_shipping_state']."</state>" : "<state/>" !!}
            {!! $order['buyer_shipping_postal'] ? "<zip>".$order['buyer_shipping_postal']."</zip>" : "<zip/>" !!}
            {!! $order['buyer_shipping_country'] ? "<country>".$order['buyer_shipping_country']."</country>" : "<country/>" !!}
        </customer_data>
        <items>
          @foreach ($order["print_line_items"] as $item)
            <item>
              {!! 
                  $item['external_order_line_item_id'] ? 
                  "<order_line_item_id>".$item['external_order_line_item_id']."</order_line_item_id>" : "<order_line_item_id/>" 
              !!}
              {!! 
                $item['product_id'] ? 
                "<product_id>".$item['product_id']."</product_id>" : "<product_id/>" 
              !!}
              {!! 
                $item['quantity'] ? 
                "<quantity>".$item['quantity']."</quantity>" : "<quantity/>" 
              !!}
              {!! 
                $item['image_url'] ? 
                "<image_url>".$item['image_url']."</image_url>" : "<image_url/>" 
              !!}
            </item>
          @endforeach
        </items>
        </order>
        @endforeach
        
    
</orders>


{{-- {
  "external_order_id": 12345,
  "buyer_first_name": "John",
  "buyer_last_name": "Doe",
  "buyer_shipping_address_1": "123 Main Street",
  "buyer_shipping_address_2": null,
  "buyer_shipping_city": "Santa Monica",
  "buyer_shipping_state": "CA",
  "buyer_shipping_postal": "90014",
  "buyer_shipping_country": "US",
  "print_line_items": [
      {
          "external_order_line_item_id": 45679,
          "product_id": 13,
          "quantity": 3,
          "image_url": "https://bucket.s3.amazonsaws.com/images/image.jpg"
      },
      {
          "external_order_line_item_id": 45680,
          "product_id": 14,
          "quantity": 5,
          "image_url": "https://bucket.s3.amazonsaws.com/images/image.jpg"
      }
  ]
} --}}


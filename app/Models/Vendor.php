<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    protected $primaryKey = 'id';

    public function product_type() {
        return $this->belongsToMany(ProductType::class, "product_type_vendor");
    }

    // public function order_line_items() {
    //     return $this->hasMany(OrderLineItem::class);
    // }

    
    public function orders() {
        return $this->belongsToMany(Order::class, "order_line_items")
        ->withPivot(['id', 'product_id', 'order_id', 'vendor_id', 'quantity']);
    }

    public function products() {
        return $this->belongsToMany(Product::class, "order_line_items");
    }

    public function response() {
        return $this->belongsToMany(Response::class, "response_vendors")->wherePivot('active', 1)->select(['name']);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo(User::class);
    }

    // public function order_line_items() {
    //     return $this->hasMany(OrderLineItem::class);
    // }

    // public function product() {
    //     return $this->hasOneThrough(Order::class, Product::class);
    // }

    public function products() {
        return $this->belongsToMany(Product::class, "order_line_items", "order_id", "product_id");
    }
    public function vendors() {
        return $this->belongsToMany(Vendor::class, "order_line_items");
    }
}

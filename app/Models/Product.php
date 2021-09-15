<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    public function creative() {
        return $this->belongsTo(Creative::class);
    }

    public function product_type() {
        return $this->belongsTo(ProductType::class);
    }

    // public function order_line_items() {
    //     return $this->hasMany(OrderLineItem::class);
    // }

    public function orders() {
        return $this->belongsToMany(Order::class, "order_line_items");
    }
    public function vendors() {
        return $this->belongsToMany(Vendor::class, "order_line_items");
    }
}

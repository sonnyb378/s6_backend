<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLineItem extends Model
{
    use HasFactory;

    protected $table = 'order_line_items';
    protected $primaryKey = 'id';

    // public function order() {
    //     return $this->belongsTo(Order::class);
    // }
    // public function product() {
    //     return $this->belongsTo(Product::class);
    // }
    // public function vendor() {
    //     return $this->belongsTo(Vendor::class);
    // }
}

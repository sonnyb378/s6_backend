<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTypeVendor extends Model
{
    use HasFactory;

    protected $table = 'product_type_vendor';
    protected $primaryKey = 'id';
    
}

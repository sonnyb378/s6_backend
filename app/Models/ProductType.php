<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $table = 'product_types';
    protected $primaryKey = 'id';

    public function products() {
        return $this->hasMany(Products::class);
    }

    public function vendors() {
        return $this->belongsToMany(Vendor::class, "product_type_vendor");
    }
}

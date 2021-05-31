<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsTypes extends Model
{
    protected $table = 'products_types';
    protected $fillable = ['product_id', 'type_id'];
}

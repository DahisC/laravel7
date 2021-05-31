<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsTypesConnect extends Model
{
    protected $table = 'products_types_connect';
    protected $fillable = ['product_id', 'type_id'];

    public function products() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}

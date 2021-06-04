<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['name', 'price', 'description'];
    // public function type() {
    //     return $this->hasOne(ProductType::class, 'id', 'type_id');
    // }
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }
    public function types()
    {
        return $this->belongsToMany(ProductType::class, ProductsTypesConnect::class, 'product_id', 'type_id');
    }
    public function test()
    {
        return $this->hasMany(ProductsTypesConnect::class, 'product_id', 'id');
    }
}

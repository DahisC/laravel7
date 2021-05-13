<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['type_id', 'name', 'price', 'description', 'images'];
    public function type() {
        return $this->hasOne(ProductType::class, 'id', 'type_id');
    }
}

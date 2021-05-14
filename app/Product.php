<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['type_id', 'name', 'price', 'description'];
    public function type() {
        return $this->hasOne(ProductType::class, 'id', 'type_id');
    }
    public function images() {
        return $this->hasMany(ProductImages::class);
    }
}

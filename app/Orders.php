<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
    public function items()
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }
}

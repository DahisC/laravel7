<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'order_items';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}

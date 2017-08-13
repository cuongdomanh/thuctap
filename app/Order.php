<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'name',
        'address',
        'phone',
        'total_amount',
        'note',
        'status',
        'is_deleted'
    ];
}

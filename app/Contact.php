<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'title',
        'message',
        'status',
        'is_deleted',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    protected $fillable = [
        'product_id',
        'name',
        'url',
        'format',
        'size',
        'status',
        'is_deleted',
        'status',
    ];
}

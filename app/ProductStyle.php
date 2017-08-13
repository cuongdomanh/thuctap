<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStyle extends Model
{
    protected $table = 'product_style';

    protected $fillable = ['product_id', 'style_id'];

//    public function item()
//    {
//        return $this->belongsTo('App\Style', 'style_id', 'id');
//    }
}

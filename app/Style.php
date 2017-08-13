<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $table = 'styles';
    protected $fillable = ['name', 'slug'];

    public function product()
    {
        return $this->belongsToMany('App\Product', 'product_style', 'style_id', 'product_id');
    }

}

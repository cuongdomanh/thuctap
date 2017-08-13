<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title',
        'slug',
        'price',
        'quantity',
        'discount',
        'description',
        'thumbnail',
        'status',
        'is_deleted',
        'category_id'
    ];

    public function image()
    {
        return $this->hasMany('App\Image', 'product_id', 'id')->where('is_deleted', '0');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'tag_product', 'product_id', 'tag_id');
    }

    public function style()
    {
        return $this->belongsToMany('App\Style', 'product_style', 'product_id', 'style_id');
    }

//    public function style() {
//        return $this->hasMany('App\ProductStyle', 'product_id', 'id');
//    }
}

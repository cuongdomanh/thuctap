<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['title', 'slug', 'status', 'is_deleted'];

    public function product(){
        return $this->belongsToMany('App\Product','tag_product','tag_id','product_id');
    }

    public function news(){
        return $this->belongsToMany('App\News','tag_news','tag_id','news_id');
    }
}

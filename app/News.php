<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'content',
        'status',
        'is_deleted',
        'category_id'
    ];

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'tag_news', 'news_id', 'tag_id');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id')->where('is_deleted', false);
    }
}

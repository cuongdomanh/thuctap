<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTag extends Model
{
    protected $table = 'tag_news';

    protected $fillable = ['news_id', 'tag_id'];
}

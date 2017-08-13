<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $table='tag_product';

    protected $fillable=['product_id','tag_id'];
}

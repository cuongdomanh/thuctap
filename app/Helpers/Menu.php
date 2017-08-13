<?php

namespace App\Helpers;

use App\Category;

class Menu
{

    public static function getAll()
    {
        $list = Category::where('is_deleted', false)->where('parent_id', 0)->where('status','1')->get();
        foreach ($list as $item) {
            $item->child = Category::where('is_deleted', false)->where('parent_id', $item->id)->get();
        }
        return $list;
    }
}

?>



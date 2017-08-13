<?php
/**
 * Created by PhpStorm.
 * User: anhcong
 * Date: 2/25/17
 * Time: 11:10 PM
 */

namespace app\Helpers;

use App\Role;

class Module
{
    public static function all()
    {
        $mods = [
            ['slug' => 'dashboard', 'show' => true, 'title' => 'Dashboard', 'url' => 'admin', 'icon' => 'icon-home', 'permission' => []],
            ['slug' => 'category', 'show' => true, 'title' => 'Quản Lý Danh Mục', 'url' => 'admin/category', 'icon' => 'icon-layers',
                'permission' => ['category-list', 'category-create', 'category-edit', 'category-delete']],
            ['slug' => 'user', 'show' => true, 'title' => 'Quản lý thành viên', 'url' => 'admin/user', 'icon' => 'icon-user',
                'permission' => ['user-list', 'user-create', 'user-edit', 'user-delete']],
            ['slug' => 'role', 'show' => true, 'title' => 'Quản lý quyền truy cập', 'url' => 'admin/role', 'icon' => 'icon-puzzle',
                'permission' => ['role-list', 'role-create', 'role-edit', 'role-delete']],
            ['slug' => 'news', 'show' => true, 'title' => 'Quản lý tin tức ', 'url' => 'admin/news', 'icon' => 'icon-puzzle',
                'permission' => ['news-list', 'news-create', 'news-edit', 'news-delete']],
            ['slug' => 'style', 'show' => true, 'title' => 'Quản lý phong cách ', 'url' => 'admin/style', 'icon' => 'icon-puzzle',
                'permission' => ['style-list', 'style-create', 'style-edit', 'style-delete']],
            ['slug' => 'product', 'show' => true, 'title' => 'Quản lý sản phẩm ', 'url' => 'admin/role', 'icon' => 'icon-puzzle',
                'permission' => ['product-list', 'product-create', 'product-edit', 'product-delete']],
            ['slug' => 'notice', 'show' => true, 'title' => 'Quản lý thông báo ', 'url' => 'admin/notice', 'icon' => 'icon-puzzle',
                'permission' => ['notice-list', 'notice-create', 'notice-edit', 'notice-delete']],
            ['slug' => 'order', 'show' => true, 'title' => 'Quản lý hóa đơn', 'url' => 'admin/order', 'icon' => 'icon-puzzle',
                'permission' => ['order-list', 'order-create', 'order-edit', 'order-delete']],
            ['slug' => 'tag', 'show' => true, 'title' => 'Quản lý thẻ', 'url' => 'admin/tag', 'icon' => 'icon-puzzle',
                'permission' => ['tag-list', 'tag-create', 'tag-edit', 'tag-delete']],
            ['slug' => 'slide', 'show' => true, 'title' => 'Quản lý quảng cáo', 'url' => 'admin/slide', 'icon' => 'icon-puzzle',
                'permission' => ['slide-list', 'slide-create', 'slide-edit', 'slide-delete']],
        ];

        return $mods;
    }

    public static function dashboard()
    {
        $dashboard = [
            ['slug' => 'dashboard', 'title' => 'Trang chủ', 'url' => 'admin', 'icon' => 'icon-bar-chart'],
        ];

        return $dashboard;
    }

    public static function news()
    {

        $course = [
            ['slug' => 'news', 'title' => 'Tin tức', 'url' => 'admin/news', 'icon' => 'glyphicon glyphicon-blackboard'],

        ];

        return $course;
    }

    public static function product()
    {
        $product = [
            ['slug' => 'product', 'title' => 'Sản phẩm', 'url' => 'admin/product', 'icon' => 'glyphicon glyphicon-book
              glyphicon '],
            ['slug' => 'style', 'title' => 'Phong cách', 'url' => 'admin/style', 'icon' => 'glyphicon glyphicon-star
              glyphicon '],
        ];

        return $product;
    }

    public static function user()
    {
        $user = [
            ['slug' => 'user', 'title' => 'Quản trị viên', 'url' => 'admin/user', 'icon' => 'glyphicon glyphicon-king '],
//            ['slug' => 'member', 'title' => 'Thành viên', 'url' => 'admin/member', 'icon' => 'glyphicon glyphicon-queen '],
            ['slug' => 'role', 'title' => 'Phân quyền', 'url' => 'admin/role', 'icon' => 'glyphicon glyphicon-knight '],
        ];

        return $user;
    }


    public static function contact()
    {
        $contact = [
            ['slug' => 'notice', 'title' => 'Thông báo', 'url' => 'admin/notice', 'icon' => 'glyphicon glyphicon-bell'],
            ['slug' => 'contact', 'title' => 'Hộp thư đến', 'url' => 'admin/contact', 'icon' => 'glyphicon glyphicon-envelope'],
//            ['slug' => 'comment', 'title' => 'Đánh giá', 'url' => 'admin/comment/book', 'icon' => 'glyphicon glyphicon-comment'],
        ];

        return $contact;
    }

    public static function order()
    {
        $order = [
            ['slug' => 'order', 'title' => 'Hóa Đơn', 'url' => 'admin/order', 'icon' => 'glyphicon glyphicon-piggy-bank '],
        ];

        return $order;
    }

    public static function content()
    {
        $content = [
            ['slug' => 'tag', 'title' => 'Thẻ', 'url' => 'admin/tag', 'icon' => 'glyphicon glyphicon-tags '],
            ['slug' => 'category', 'title' => 'Danh Mục', 'url' => 'admin/category', 'icon' => 'glyphicon glyphicon-list '],
            ['slug' => 'slide', 'title' => 'Slide', 'url' => 'admin/slide', 'icon' => 'glyphicon glyphicon-film '],
        ];

        return $content;
    }

    public static function arrayRole()
    {
        $role = Role::all();
        $string = "role:";
        foreach ($role as $key => $item) {
            if ($key == count($role) - 1) {
                $string = $string . $item->name;
            } else {
                $string = $string . $item->name . "|";
            }
        }
        return $string;
    }
}



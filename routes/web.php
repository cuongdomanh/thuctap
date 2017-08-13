<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::group(['middleware' => ['auth']], function () {
//Route::group(['prefix' => 'admin'], function () {
//    Route::get('/', 'Admin\DashboardController@index');
//    Route::resource('product', 'Admin\ProductController');
//    Route::resource('contact', 'Admin\ContactController');
//    Route::resource('subscribe', 'Admin\SubscribeController');
//    Route::resource('notice', 'Admin\NoticeController');
//    Route::resource('tag', 'Admin\TagController');
//    Route::resource('slide', 'Admin\SlideController');
//    Route::resource('style', 'Admin\StyleController');
//    Route::get('deleteimage/{id}', 'Admin\ProductController@deleteimage');
//
//    Route::resource('user', 'Admin\UserController');
//    Route::resource('role', 'Admin\RoleController');
//
//    Route::resource('category', 'Admin\CategoryController');
//    Route::resource('news', 'Admin\NewsController');
//    Route::resource('order', 'Admin\OrderController');
//});
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => [Module::arrayRole()], 'prefix' => 'admin'], function () {
        Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);
        Route::resource('tag', 'Admin\TagController');
        Route::resource('subscribe', 'Admin\SubscribeController');
        Route::resource('contact', 'Admin\ContactController');


        Route::get('user', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index',
            'middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
        Route::post('user', ['as' => 'admin.user.store', 'uses' => 'Admin\UserController@store',
            'middleware' => ['permission:user-create']]);
        Route::get('user/create', ['as' => 'admin.user.create', 'uses' => 'Admin\UserController@create',
            'middleware' => ['permission:user-create']]);
        Route::get('user/{id}/edit', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit',
            'middleware' => ['permission:user-edit']]);
        Route::patch('user/{id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update',
            'middleware' => ['permission:user-edit']]);
        Route::delete('user/{id}', ['as' => 'admin.user.destroy', 'uses' => 'Admin\UserController@destroy',
            'middleware' => ['permission:user-delete']]);

        Route::get('category', ['as' => 'admin.category.index', 'uses' => 'Admin\CategoryController@index',
            'middleware' => ['permission:category-list|category-create|category-edit|category-delete']]);
        Route::post('category', ['as' => 'admin.category.store', 'uses' => 'Admin\CategoryController@store',
            'middleware' => ['permission:category-create']]);
        Route::get('category/create', ['as' => 'admin.category.create', 'uses' => 'Admin\CategoryController@create',
            'middleware' => ['permission:category-create']]);
        Route::get('category/{id}/edit', ['as' => 'admin.category.edit', 'uses' => 'Admin\CategoryController@edit',
            'middleware' => ['permission:category-edit']]);
        Route::patch('category/{id}', ['as' => 'admin.category.update', 'uses' => 'Admin\CategoryController@update',
            'middleware' => ['permission:category-edit']]);
        Route::delete('category/{id}', ['as' => 'admin.category.destroy', 'uses' => 'Admin\CategoryController@destroy',
            'middleware' => ['permission:category-delete']]);

        Route::get('role', ['as' => 'admin.role.index', 'uses' => 'Admin\RoleController@index',
            'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
        Route::post('role', ['as' => 'admin.role.store', 'uses' => 'Admin\RoleController@store',
            'middleware' => ['permission:role-create']]);
        Route::get('role/create', ['as' => 'admin.role.create', 'uses' => 'Admin\RoleController@create',
            'middleware' => ['permission:role-create']]);
        Route::get('role/{id}/edit', ['as' => 'admin.role.edit', 'uses' => 'Admin\RoleController@edit',
            'middleware' => ['permission:role-edit']]);
        Route::patch('role/{id}', ['as' => 'admin.role.update', 'uses' => 'Admin\RoleController@update',
            'middleware' => ['permission:role-edit']]);
        Route::delete('role/{id}', ['as' => 'admin.role.destroy', 'uses' => 'Admin\RoleController@destroy',
            'middleware' => ['permission:role-delete']]);

        Route::get('product', ['as' => 'admin.product.index', 'uses' => 'Admin\ProductController@index',
            'middleware' => ['permission:product-list|product-create|product-edit|product-delete']]);
        Route::post('product', ['as' => 'admin.product.store', 'uses' => 'Admin\ProductController@store',
            'middleware' => ['permission:product-create']]);
        Route::get('product/create', ['as' => 'admin.product.create', 'uses' => 'Admin\ProductController@create',
            'middleware' => ['permission:product-create']]);
        Route::get('product/{id}/edit', ['as' => 'admin.product.edit', 'uses' => 'Admin\ProductController@edit',
            'middleware' => ['permission:product-edit']]);
        Route::patch('product/{id}', ['as' => 'admin.product.update', 'uses' => 'Admin\ProductController@update',
            'middleware' => ['permission:product-edit']]);
        Route::delete('product/{id}', ['as' => 'admin.product.destroy', 'uses' => 'Admin\ProductController@destroy',
            'middleware' => ['permission:product-delete']]);
        Route::get('deleteimage/{id}', ['as' => 'admin.product.edit', 'uses' => 'Admin\ProductController@deleteimage',
            'middleware' => ['permission:product-edit']]);
        Route::get('product/{id}', 'Admin\ProductController@show');

        Route::get('news', ['as' => 'admin.news.index', 'uses' => 'Admin\NewsController@index',
            'middleware' => ['permission:news-list|news-create|news-edit|news-delete']]);
        Route::post('news', ['as' => 'admin.news.store', 'uses' => 'Admin\NewsController@store',
            'middleware' => ['permission:news-create']]);
        Route::get('news/create', ['as' => 'admin.news.create', 'uses' => 'Admin\NewsController@create',
            'middleware' => ['permission:news-create']]);
        Route::get('news/{id}/edit', ['as' => 'admin.news.edit', 'uses' => 'Admin\NewsController@edit',
            'middleware' => ['permission:news-edit']]);
        Route::patch('news/{id}', ['as' => 'admin.news.update', 'uses' => 'Admin\NewsController@update',
            'middleware' => ['permission:news-edit']]);
        Route::delete('news/{id}', ['as' => 'admin.news.destroy', 'uses' => 'Admin\NewsController@destroy',
            'middleware' => ['permission:news-delete']]);
        Route::get('news/{id}', 'Admin\NewsController@show');

        Route::get('style', ['as' => 'admin.style.index', 'uses' => 'Admin\StyleController@index',
            'middleware' => ['permission:style-list|style-create|style-edit|style-delete']]);
        Route::post('style', ['as' => 'admin.style.store', 'uses' => 'Admin\StyleController@store',
            'middleware' => ['permission:style-create']]);
        Route::get('style/create', ['as' => 'admin.style.create', 'uses' => 'Admin\StyleController@create',
            'middleware' => ['permission:style-create']]);
        Route::get('style/{id}/edit', ['as' => 'admin.style.edit', 'uses' => 'Admin\StyleController@edit',
            'middleware' => ['permission:style-edit']]);
        Route::patch('style/{id}', ['as' => 'admin.style.update', 'uses' => 'Admin\StyleController@update',
            'middleware' => ['permission:style-edit']]);
        Route::delete('style/{id}', ['as' => 'admin.style.destroy', 'uses' => 'Admin\StyleController@destroy',
            'middleware' => ['permission:style-delete']]);

        Route::get('notice', ['as' => 'admin.notice.index', 'uses' => 'Admin\NoticeController@index',
            'middleware' => ['permission:notice-list|notice-create|notice-edit|notice-delete']]);
        Route::post('notice', ['as' => 'admin.notice.store', 'uses' => 'Admin\NoticeController@store',
            'middleware' => ['permission:notice-create']]);
        Route::get('notice/create', ['as' => 'admin.notice.create', 'uses' => 'Admin\NoticeController@create',
            'middleware' => ['permission:notice-create']]);
        Route::get('notice/{id}/edit', ['as' => 'admin.notice.edit', 'uses' => 'Admin\NoticeController@edit',
            'middleware' => ['permission:notice-edit']]);
        Route::patch('notice/{id}', ['as' => 'admin.notice.update', 'uses' => 'Admin\NoticeController@update',
            'middleware' => ['permission:notice-edit']]);
        Route::delete('notice/{id}', ['as' => 'admin.notice.destroy', 'uses' => 'Admin\NoticeController@destroy',
            'middleware' => ['permission:notice-delete']]);

        Route::get('notice', ['as' => 'admin.notice.index', 'uses' => 'Admin\NoticeController@index',
            'middleware' => ['permission:notice-list|notice-create|notice-edit|notice-delete']]);
        Route::post('notice', ['as' => 'admin.notice.store', 'uses' => 'Admin\NoticeController@store',
            'middleware' => ['permission:notice-create']]);
        Route::get('notice/create', ['as' => 'admin.notice.create', 'uses' => 'Admin\NoticeController@create',
            'middleware' => ['permission:notice-create']]);
        Route::get('notice/{id}/edit', ['as' => 'admin.notice.edit', 'uses' => 'Admin\NoticeController@edit',
            'middleware' => ['permission:notice-edit']]);
        Route::patch('notice/{id}', ['as' => 'admin.notice.update', 'uses' => 'Admin\NoticeController@update',
            'middleware' => ['permission:notice-edit']]);
        Route::delete('notice/{id}', ['as' => 'admin.notice.destroy', 'uses' => 'Admin\NoticeController@destroy',
            'middleware' => ['permission:notice-delete']]);

        Route::get('slide', ['as' => 'admin.slide.index', 'uses' => 'Admin\SlideController@index',
            'middleware' => ['permission:slide-list|slide-create|slide-edit|slide-delete']]);
        Route::post('slide', ['as' => 'admin.slide.store', 'uses' => 'Admin\SlideController@store',
            'middleware' => ['permission:slide-create']]);
        Route::get('slide/create', ['as' => 'admin.slide.create', 'uses' => 'Admin\SlideController@create',
            'middleware' => ['permission:slide-create']]);
        Route::get('slide/{id}/edit', ['as' => 'admin.slide.edit', 'uses' => 'Admin\SlideController@edit',
            'middleware' => ['permission:slide-edit']]);
        Route::patch('slide/{id}', ['as' => 'admin.slide.update', 'uses' => 'Admin\SlideController@update',
            'middleware' => ['permission:slide-edit']]);
        Route::delete('slide/{id}', ['as' => 'admin.slide.destroy', 'uses' => 'Admin\SlideController@destroy',
            'middleware' => ['permission:slide-delete']]);

        Route::get('tag', ['as' => 'admin.tag.index', 'uses' => 'Admin\TagController@index',
            'middleware' => ['permission:tag-list|tag-create|tag-edit|tag-delete']]);
        Route::post('tag', ['as' => 'admin.tag.store', 'uses' => 'Admin\TagController@store',
            'middleware' => ['permission:tag-create']]);
        Route::get('tag/create', ['as' => 'admin.tag.create', 'uses' => 'Admin\TagController@create',
            'middleware' => ['permission:tag-create']]);
        Route::get('tag/{id}/edit', ['as' => 'admin.tag.edit', 'uses' => 'Admin\TagController@edit',
            'middleware' => ['permission:tag-edit']]);
        Route::patch('tag/{id}', ['as' => 'admin.tag.update', 'uses' => 'Admin\TagController@update',
            'middleware' => ['permission:tag-edit']]);
        Route::delete('tag/{id}', ['as' => 'admin.tag.destroy', 'uses' => 'Admin\TagController@destroy',
            'middleware' => ['permission:tag-delete']]);

        Route::get('order', ['as' => 'admin.order.index', 'uses' => 'Admin\OrderController@index',
            'middleware' => ['permission:order-list|order-create|order-edit|order-delete']]);
        Route::get('order/{id}/edit', ['as' => 'admin.order.edit', 'uses' => 'Admin\OrderController@edit',
            'middleware' => ['permission:order-edit']]);
        Route::patch('order/{id}', ['as' => 'admin.order.update', 'uses' => 'Admin\OrderController@update',
            'middleware' => ['permission:order-edit']]);
        Route::get('order/{id}', ['as' => 'admin.order.show', 'uses' => 'Admin\OrderController@show',
            'middleware' => ['permission:order-list']]);

    });
});

Route::get('', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('search', 'HomeController@search');
Route::get('contact', 'ContactController@getcontact');
Route::post('postcontact', 'ContactController@postcontact');
Route::get('news/tag/{id}', 'NewsController@newsTag');
Route::get('news', 'NewsController@index');
Route::get('news/{id}', 'NewsController@index');
Route::get('news/{id}/{slug}', 'NewsController@detailNews');

Route::get('product', 'ProductController@index');
Route::get('product/{id}', 'ProductController@index');
Route::get('product/{id}/{slug}', 'ProductController@detailProduct');
Route::post('subscribe', 'HomeController@subscribe');
Route::get('about', 'AboutController@index');

Route::resource('cart', 'CartController');
Route::get('addcart/{id}', 'CartController@addcart');
Route::get('deleteall', 'CartController@destroyall');

Route::resource('order', 'OrderController');
Route::get('check/{id}', 'OrderController@check');
Route::get('destroycart/{id}', 'OrderController@destroyCart');

Route::get('auth/facebook', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'HomeController@logout');

Route::get('demos/loaddata','DemoController@loadData');
Route::post('demos/loaddata','DemoController@loadDataAjax' );




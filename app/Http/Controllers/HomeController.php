<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Category;
use App\Product;
use App\News;
use App\Style;
use App\ProductStyle;
use App\Subscribe;
use Session;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        return view('home');
//    }

    public function index()
    {
        $banner = Slide::where('is_deleted', false)->where('type', 0)->orderBy('created_at', 'DESC')->limit(2)->get();
        $show1 = Slide::where('is_deleted', false)->where('type', 1)->orderBy('created_at', 'DESC')->first();
        $show2 = Slide::where('is_deleted', false)->where('type', 2)->orderBy('created_at', 'DESC')->first();
        $category = Category::where('is_deleted', 0)->where('parent_id', 5)->get();
        $productNew = Product::where('is_deleted', false)->orderBy('created_at', 'DESC')->limit(30)->get();
        $product = Product::where('is_deleted', false)->orderBy('created_at', 'DESC')->get();
        $style = Style::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $styleProduct = ProductStyle::select('product_id')->get();
        foreach ($styleProduct as $item) {
            $styleB[$item->product_id] = $item->product_id;
        }
        $news = News::where('is_deleted', false)->orderBy('created_at', 'desc')->limit(3)->get();
        $newsRandom = News::where('is_deleted', false)->inRandomOrder()->limit(2)->get();
        return view('client.pages.home',
            ['banner' => $banner,
                'category' => $category,
                'product' => $product,
                'productNew' => $productNew,
                'news' => $news,
                'style' => $style,
                'show1' => $show1,
                'show2' => $show2,
                'styleProduct' => $styleB,
                'newsRandom' => $newsRandom]);
    }

    public function subscribe(Request $request)
    {
        $sub = new Subscribe();
        $sub->email = $request->email;
        $sub->save();

        Session::flash('success', 'Cám ơn bạn đã đăng ký gửi thông tin qua email');

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $keyword = '';
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $product = Product::where('is_deleted', false)->where('title', 'like', "%$keyword%")->limit(8)->get();
            $news = News::where('is_deleted', false)->where('title', 'like', "%$keyword%")->limit(8)->get();
        } else {
            $product = Product::where('is_deleted', false)->limit(8)->get();
            $news = News::where('is_deleted', false)->limit(8)->get();
        }

        return view('client.pages.search',
            ['product' => $product,
                'news' => $news,
                'keyword' => $keyword]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

}

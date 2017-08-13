<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Product;
use App\OrderDetail;
use App\News;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $total_product = Product::where('is_deleted', false)->where('created_at', '>=', $start)
                ->where('created_at', '<=', $end)->count();
        $total_news = News::where('is_deleted', false)->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)->count();
        $total_order = Order::where('is_deleted', false)->where('status', 2)->count();
        $total_amount = DB::table('orders')->where('is_deleted', false)->where('orders.updated_at', '>=', $start)
            ->where('orders.updated_at', '<=', $end)->sum('orders.total_amount');
        $month = Carbon::now()->month;

        return view('admin.dashboard', [
            'total_product' => $total_product,
            'total_news' => $total_news,
            'total_order' => $total_order,
            'total_amount' => $total_amount,
            'month' => $month
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

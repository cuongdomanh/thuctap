<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use Session;
use Cart;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Cart::count() == 0) {
            Session::flash('warning', 'Không có sản phẩm nào trong giỏ hàng');

            return redirect()->back();
        }
        if (Auth::check()) {
            $this->validate($request,[
                'address' => 'required',
                'phone' => 'required',
                'note' => 'required'
            ], [
                'address.required' => 'Địa chỉ không được để trống',
                'phone.required' => 'Số điện thoại không được để trống',
                'note.required' => 'Ghi chú không được để trống'
            ]);
        }else {
            $this->validate($request,[
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'note' => 'required'
            ], [
                'name.required' => 'Họ tên không được để trống',
                'address.required' => 'Địa chỉ không được để trống',
                'phone.required' => 'Số điện thoại không được để trống',
                'note.required' => 'Ghi chú không được để trống'
            ]);
        }

        $order = new Order();
//        if(Auth::check()) {
//            $order->name = Auth::user()->name;
//        }else{
//            $order->name = $request->name;
//        }
        $order->name = Auth::check() ? Auth::user()->name : $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->total_amount = $request->subtotal;
        $order->note = $request->note;
        $order->status = 3;
        $order->save();

        foreach (Cart::content() as $item)
        {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $item->id;
            $orderDetail->quantity = $item->qty;
            $orderDetail->amount = $item->options->amount;
            $orderDetail->price = $item->price;
            $orderDetail->save();
        }

        return redirect('check/'. $order->id );
    }

    public function check($id)
    {
        $order = Order::where('is_deleted', false)->where('id', $id)->first();

        return view('client.cart.check', ['order' => $order]);
    }

    public function destroyCart($id)
    {
        $order = Order::where('is_deleted', false)->where('id', $id)->first();
        $order->status = 0;
        $order->save();
        Cart::destroy();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.cart.cart');
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
        //
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
        foreach (Cart::content() as $item)
        {
            if($item->id == $id) {
                Cart::remove($item->rowId);
                break;
            }
        }

        return redirect()->back();
    }

    public function destroyall()
    {
        Cart::destroy();
        return redirect('product');
    }

    public function addcart(Request $request, $id)
    {
        $index = 0;
        if($request->has('qty')) {
            foreach (Cart::content() as $item)
            {
                if($item->id == $id) {
                    $index = 1;
                    Cart::update($item->rowId, [
                        'qty' => $request->qty,
                        'options' => [
                            'slug' => $item->options->slug,
                            'thumbnail' => $item->options->thumbnail,
                            'discount' => $item->options->discount,
                            'amount' => $item->price * $request->qty
                        ]
                    ]);
                    break;
                }
            }

            if ($index == 0) {
                $pro = Product::where('is_deleted', false)->where('id', $id)->first();
                Cart::add([
                    'id' => $id,
                    'name' => $pro->title,
                    'price' => $pro->price * (1 - $pro->discount/100),
                    'qty' => $request->qty,
                    'options' => [
                        'slug' => $pro->slug,
                        'thumbnail' => $pro->thumbnail,
                        'discount' => $pro->discount,
                        'amount' => $pro->price * $request->qty * (1 - $pro->discount/100)
                    ]
                ]);
            }
        } else {
            $count = 0;
            foreach (Cart::content() as $item)
            {
                if($item->id == $id) {
                    $count = 1;
                    Cart::update($item->rowId, [
                        'qty' => $item->qty +1,
                        'options' => [
                            'slug' => $item->options->slug,
                            'thumbnail' => $item->options->thumbnail,
                            'discount' => $item->options->discount,
                            'amount' => $item->price * ($item->qty +1)
                        ]
                    ]);
                    break;
                }
            }

            if($count == 0) {
                $pro = Product::where('is_deleted', false)->where('id', $id)->first();
                Cart::add([
                    'id' => $id,
                    'name' => $pro->title,
                    'price' => $pro->price * (1-$pro->discount/100),
                    'qty'=> 1,
                    'options' => [
                        'slug' => $pro->slug,
                        'thumbnail' => $pro->thumbnail,
                        'discount' => $pro->discount,
                        'amount' => $pro->price * (1 - $pro->discount/100)
                    ]
                ]);
            }

        }

        return redirect()->back();
    }
}

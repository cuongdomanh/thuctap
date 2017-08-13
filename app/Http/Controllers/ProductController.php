<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id = null)
    {
        $product = Product::where('is_deleted', false)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        if (isset($id)) {
            $product = Product::where('is_deleted', false)
                ->where('category_id', $id)
                ->paginate(12);
        }

        return view('client.product.product', ['product' => $product]);
    }

    public function detailProduct(Request $request, $id)
    {
        $product = Product::where('is_deleted', false)->find($id);
        $randomproduct = Product::where('is_deleted', false)->orderBy('created_at', 'desc')->inRandomOrder()->limit(4)->get();
        return view('client.product.detailProduct',
            ['product' => $product,
                'randomproduct' => $randomproduct]);
    }
}

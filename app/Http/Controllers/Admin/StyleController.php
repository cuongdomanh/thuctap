<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\ProductStyle;
use App\Style;
use Session;
use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Style::where('is_deleted', false);
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $list = $list->where('name', 'like', "%$keyword%");
        }
        $list = $list->orderBy('id', 'DESC')->paginate(5);
        return view('admin.style.list', compact('list'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $product_id = null;
        $product = Product::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        if (isset($id)) {
            $product_id = $id;
        }
        return view('admin.style.create', ['product' => $product, 'product_id' => $product_id]);
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
        $this->validate($request, [
            'name' => 'required'
        ]);
        $requestData = $request->all();
        $requestData['slug'] = Helper::slug($request['name']);
        $style = Style::create($requestData);
        if ($request->has('product_id')) {
            $styleProduct = new ProductStyle();
            $styleProduct->style_id = $style->id;
            $styleProduct->product_id = $request->product_id;
            $styleProduct->save();
        }
        if (!empty($request->product)) {
            foreach ($request->product as $product) {
                $styleProduct = new ProductStyle();
                $styleProduct->style_id = $style->id;
                $styleProduct->product_id = $product;
                $styleProduct->save();
            }
        }
        Session::flash('success', 'Thêm mới thành công');

        return redirect('admin/style');

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
        $style = Style::where('is_deleted', false)
            ->where('id', $id)
            ->first();
        $product = Product::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $styleProduct = ProductStyle::where('style_id', $id)->get();
        foreach ($styleProduct as $item) {
            $styleB[$item->product_id] = $item->product_id;
        }
        return view('admin.style.edit',
            ['style' => $style,
                'product' => $product,
                'styleProduct' => $styleB
            ]);
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
        $this->validate($request, [
            'name' => 'required'
        ]);
        $style = Style::findOrFail($id);
        $requestData = $request->all();
        $requestData['slug'] = Helper::slug($requestData['name']);
        $style->update($requestData);
        $styleProduct = ProductStyle::where('style_id', $style->id)->get();
        foreach ($styleProduct as $item) {
            $item->delete();
        }
        if (!empty($request->product)) {
            foreach ($request->product as $product) {
                $styleProduct = new ProductStyle();
                $styleProduct->style_id = $style->id;
                $styleProduct->product_id = $product;
                $styleProduct->save();
            }
        }
        Session::flash('success', 'Cập nhật thành công');

        return redirect('admin/style');
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
        $style = Style::findOrFail($id);
        $style->is_deleted = 1;
        $style->save();
        Session::flash('success', 'Xóa "' . $style->title . '" thành công');

        return redirect('/admin/style');
    }
}

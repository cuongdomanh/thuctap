<?php

namespace App\Http\Controllers\Admin;

use App\ProductStyle;
use App\Style;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Tag;
use App\Image;
use App\ProductTag;
use Session;
use Helper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Product::where('is_deleted', false);
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $list = $list->where('title', 'like', "%$keyword%");
        }
        $list = $list->orderBy('id', 'DESC')->paginate(10);

        return view('admin.product.list', ['list' => $list])
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('is_deleted', false)->get();
        $tag = Tag::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $style = Style::where('is_deleted', false)->orderBy('id', 'DESC')->get();

        return view('admin.product.create',
            ['category' => $category,
                'tag' => $tag,
                'style' => $style]);
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
            'title' => 'required',
            'price' => 'required|numeric',
            'thumbnail' => 'required|max:10000',
            'quantity' => 'required|numeric',
            'category' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['slug'] = Helper::slug($requestData['title']);
        $requestData['category_id'] = $request->category;
        $requestData['status'] = isset($requestData['status']) ? true : false;
        if ($request->hasFile('thumbnail')) {
            $name = md5(($request->file('thumbnail')->getClientOriginalName())
                    . date('Y-m-d H:i:s'))
                . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $public_path = public_path('uploads/products');
            $requestData['thumbnail'] = 'uploads/products/' . $name;
            $move = $request->file('thumbnail')->move($public_path, $name);
        }
        $product = Product::create($requestData);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $avatar = md5(($fileName) . date('Y-m-d H:i:s')) . '.' . $file->getClientOriginalExtension();
                while (file_exists("uploads/images/" . $avatar)) {
                    $avatar = str_random(4) . "_" . $fileName;
                }
                $requestData['name'] = $avatar;
                $requestData['url'] = 'uploads/images/' . $avatar;
                $requestData['format'] = $file->getClientOriginalExtension();
                $requestData['size'] = number_format($file->getSize() / 1024, 1) . ' Kb';
                $requestData['product_id'] = $product->id;
                $file->move(public_path('uploads/images/'), $avatar);
                Image::create($requestData);
            }
        }
        if ($request->has('tag')) {
            foreach ($request->tag as $key => $item) {
                $productTag = new ProductTag();
                $productTag->tag_id = $item;
                $productTag->product_id = $product->id;
                $productTag->save();
            }
        }
        if (!empty($request->style)) {
            foreach ($request->style as $style) {
                $styleProduct = new ProductStyle();
                $styleProduct->style_id = $style;
                $styleProduct->product_id = $product->id;
                $styleProduct->save();
            }
        }
        Session::flash('Chúc mừng', 'Thêm mới thành công');

        return redirect('admin/product');
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
        $product = Product::where('id', $id)->first();
        $image = Image::where('is_deleted', '0')->where('product_id', $id)->get();
        return view('admin.product.show', ['product' => $product, 'image' => $image]);
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
        $styleB = null;
        $category = Category::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $product = Product::where('is_deleted', '0')->where('id', $id)->first();
        $tag = Tag::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $image = Image::where('is_deleted', '0')->where('product_id', $id)->get();
        $style = Style::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $styleProduct = ProductStyle::where('product_id', $id)->get();
        $productTag = ProductTag::where('product_id', $id)->get();
        $productT = null;
        foreach ($productTag as $item) {
            $productT[$item->tag_id] = $item->tag_id;
        }
        foreach ($styleProduct as $item) {
            $styleB[$item->style_id] = $item->style_id;
        }
        return view('admin.product.edit',
            ['category' => $category,
                'product' => $product,
                'image' => $image,
                'tag' => $tag,
                'productTag' => $productT,
                'style' => $style,
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
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['slug'] = Helper::slug($requestData['title']);
        $requestData['category_id'] = $request->category;
        $requestData['status'] = isset($requestData['status']) ? true : false;
        if ($request->hasFile('thumbnail')) {
            unlink($product->thumbnail);
            $name = md5(($request->file('thumbnail')->getClientOriginalName())
                    . date('Y-m-d H:i:s'))
                . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $public_path = public_path('uploads/products');
            $requestData['thumbnail'] = 'uploads/products/' . $name;
            $move = $request->file('thumbnail')->move($public_path, $name);
        }

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $avatar = md5(($fileName) . date('Y-m-d H:i:s')) . '.' . $file->getClientOriginalExtension();
                while (file_exists("uploads/images/" . $avatar)) {
                    $avatar = str_random(4) . "_" . $fileName;
                }
                $requestData['name'] = $avatar;
                $requestData['url'] = 'uploads/images/' . $avatar;
                $requestData['format'] = $file->getClientOriginalExtension();
                $requestData['size'] = number_format($file->getSize() / 1024, 1) . ' Kb';
                $requestData['product_id'] = $product->id;
                $file->move(public_path('uploads/images/'), $avatar);
                Image::create($requestData);
            }
        }

        $productTag = ProductTag::where('product_id', $id)->get();
        foreach ($productTag as $item) {
            $item->delete();
        }

        if ($request->has('tag')) {
            foreach ($request->tag as $key => $item) {
                $productTag = new ProductTag();
                $productTag->tag_id = $item;
                $productTag->product_id = $product->id;
                $productTag->save();
            }
        }

        $styleProduct = ProductStyle::where('product_id', $product->id)->get();
        foreach ($styleProduct as $item) {
            $item->delete();
        }
        if (!empty($request->style)) {
            foreach ($request->style as $style) {
                $styleProduct = new ProductStyle();
                $styleProduct->style_id = $style;
                $styleProduct->product_id = $product->id;
                $styleProduct->save();
            }
        }

        $product->update($requestData);
        Session::flash('success', 'Cập nhật thành công');

        return redirect('admin/product');

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
        $product = Product::findOrFail($id);
        $product->is_deleted = 1;
        $product->save();
        Session::flash('success', 'Xóa"' . $product->title . '" thành công');

        return redirect('/admin/product');
    }

    public function deleteimage($id)
    {
        $image = Image::findOrFail($id);
        unlink($image->url);
        $image->is_deleted = 1;
        $image->save();

        Session::flash('success', 'Xóa ảnh thành công');
        return redirect()->back();
    }
}

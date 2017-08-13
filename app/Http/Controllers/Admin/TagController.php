<?php

namespace App\Http\Controllers\Admin;

use App\NewsTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Product;
use App\News;
use App\ProductTag;
use Session;
use Helper;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Tag::where('is_deleted', false);
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $list = $list->where('title', 'like', "%$keyword%");
        }
        $list = $list->orderBy('id', 'DESC')->paginate(10);
        return view('admin.tag.list', compact('list'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productId = 0, $newsId = 0)
    {
        $product_id = $news_id = null;
        if ($productId != 0) {
            $product_id = $productId;
        }
        if ($newsId != 0) {
            $news_id = $newsId;
        }

        $product = Product::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $news = News::where('is_deleted', false)->orderBy('id', 'DESC')->get();

        return view('admin.tag.create',
            ['product_id' => $product_id,
                'news_id' => $news_id,
                'product' => $product,
                'news' => $news]);
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
            'title' => 'required'
        ]);
        $requestData = $request->all();
        $requestData['slug'] = Helper::slug($request['title']);
        $requestData['status'] = (isset($request['status'])) ? true : false;
        $tag = Tag::create($requestData);
        if (isset($request->product_id)) {
            $productTag = new ProductTag();
            $productTag->product_id = $request->product_id;
            $productTag->tag_id = $tag->id;
            $productTag->save();
        }
        if (isset($request->news_id)) {
            $newsTag = new NewsTag();
            $newsTag->news_id = $request->news_id;
            $newsTag->tag_id = $tag->id;
            $newsTag->save();
        }
        if ($request->has('product')) {
            foreach ($request->product as $key => $item) {
                $productTag = new ProductTag();
                $productTag->product_id = $item;
                $productTag->tag_id = $tag->id;
                $productTag->save();
            }
        }
        if ($request->has('news')) {
            foreach ($request->news as $key => $item) {
                $newsTag = new NewsTag();
                $newsTag->news_id = $item;
                $newsTag->tag_id = $tag->id;
                $newsTag->save();
            }
        }
        Session::flash('success', 'Thêm mới thành công');

        return redirect('admin/tag');
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
        $tag = Tag::where('is_deleted', false)->where('id', $id)->first();
        $product = Product::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $news = News::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $productT = $newsT = null;
        $productTag = ProductTag::where('tag_id', $id)->get();
        foreach ($productTag as $item) {
            $productT[$item->product_id] = $item->product_id;
        }
        $newsTag = NewsTag::where('tag_id', $id)->get();
        foreach ($newsTag as $item) {
            $newsT[$item->news_id] = $item->news_id;
        }

        return view('admin.tag.edit',
            ['tag' => $tag,
                'productTag' => $productT,
                'newsTag' => $newsT,
                'product' => $product,
                'news' => $news]);
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
            'title' => 'required'
        ]);
        $tag = Tag::findOrFail($id);
        $requestData = $request->all();
        $requestData['slug'] = Helper::slug($requestData['title']);
        $requestData['status'] = (isset($request['status'])) ? true : false;
        $tag->update($requestData);

        $productTag = ProductTag::where('tag_id', $id)->get();
        foreach ($productTag as $item) {
            $item->delete();
        }

        if ($request->has('product')) {
            foreach ($request->product as $key => $item) {
                $productTag = new ProductTag();
                $productTag->product_id = $item;
                $productTag->tag_id = $tag->id;
                $productTag->save();
            }
        }

        $newsTag = NewsTag::where('tag_id', $id)->get();
        foreach ($newsTag as $item) {
            $item->delete();
        }

        if ($request->has('news')) {
            foreach ($request->news as $key => $item) {
                $newsTag = new NewsTag();
                $newsTag->news_id = $item;
                $newsTag->tag_id = $tag->id;
                $newsTag->save();
            }
        }

        Session::flash('success', 'Cập nhật thành công');

        return redirect('admin/tag');
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
        $tag = Tag::findOrFail($id);
        $tag->is_deleted = 1;
        $tag->save();
        Session::flash('success', 'Xóa "' . $tag->title . '" thành công');

        return redirect('/admin/tag');
    }
}

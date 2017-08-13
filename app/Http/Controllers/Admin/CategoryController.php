<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Session;
use Helper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = null;
        $array = null;
        $list = Category::where('is_deleted', false);
        foreach($list->get() as $item) {
            if ($item->parent_id == 0) {
                $array[$item->id] = $item->title;
            }
        }
        if($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $list = $list->where('title', 'like', '%'.$keyword.'%');
        }
        $list = $list->orderBy('parent_id', 'ASC')->paginate(10);

        return view('admin.category.list', ['list' => $list, 'keyword' => $keyword, 'array' => $array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listParent = Category::where('is_deleted', false)->where('parent_id', false)->get();

        return view('admin.category.create', ['listParent' => $listParent]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ], [
            'title.required' => 'Tiêu đề không được để trống'
        ]);
        if($request->title) {
            $cate = new Category();
            $cate->title = $request->title;
            $cate->slug = Helper::slug($request->title);
            $cate->parent_id = $request->parent_id;
            $cate->type = $request->type;
            $cate->status = $request->status ? 1 : 0;
            $cate->save();

            Session::flash('success', 'Thêm mới thành công');
        }

        return redirect('admin/category');
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
        $cate = Category::where('is_deleted', false)->where('id', $id)->first();
        $listParent = Category::where('is_deleted', false)->where('parent_id', 0)->get();

        return view('admin.category.edit', ['cate' => $cate, 'listParent' => $listParent]);
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
        $this->validate($request,[
            'title' => 'required'
        ], [
            'title.required' => 'Tiêu đề không được để trống'
        ]);
        if(isset($id) && $request->title != null) {
            $cate = Category::findOrFail($id);
            $cate->title = $request->title;
            $cate->slug = Helper::slug($request->title);
            $cate->parent_id = $request->parent_id;
            $cate->type = $request->type;
            $cate->status = $request->status ? 1 : 0;
            $cate->save();

            Session::flash('success', 'Cập nhật thành công');
        }

        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = Category::where('parent_id', '$cate->id')->get();
        $cate = Category::findOrFail($id);
        $cate->is_deleted = 1;
        $cate->save();
        $list = Category::where('parent_id', $cate->id)->get();
        foreach($list as $item) {
            $item->is_deleted = 1;
            $item->save();
        }
        Session::flash('success', 'Xóa "'.$cate->title.'" thành công');

        return redirect('admin/category');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use Session;
use Helper;
use App\NewsTag;
use App\Tag;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = null;
        $list = News::where('is_deleted', false);
        if($request->has('keyword')) {
        $keyword = $request->get('keyword');
        $list = $list->where('title', 'like', '%'.$keyword.'%');
        }
        $list = $list->orderBy('id', 'DESC')->paginate(10);

        return view('admin.news.list', ['list' => $list, 'keyword' => $keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Category::where('is_deleted', false)->where('type', 2)->get();
        $tag = Tag::where('is_deleted', false)->get();

        return view('admin.news.create', ['list' => $list, 'tag' => $tag]);
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
            'title' => 'required',
            'thumbnail' => 'required|mimes:jpeg,bmp,png',
            'content' => 'required'
        ], [
            'title.required' => 'Tiêu đề không được để trống',
            'thumbnail.required' => 'Ảnh đại diện không được để trống',
            'thumbnail.mimes' => 'Định dạng ảnh không hợp lệ ( phải là jpeg,bmp,png)',
            'content.required' => 'Nội dung không được để trống'
        ]);
        $requestData = $request->all();
        $requestData['slug'] = Helper::slug($requestData['title']);
        $requestData['category_id'] = $request->category_id;
        $requestData['status'] = isset($requestData['status']) ? 1 : 0;
        if ($request->hasFile('thumbnail')) {
            $name = md5(($request->file('thumbnail')->getClientOriginalName()).date('Y-m-d H:i:s')).'.'. $request->file('thumbnail')->getClientOriginalExtension();
            $public_path = public_path('uploads/news');
            $requestData['thumbnail'] = $name;
            $move = $request->file('thumbnail')->move($public_path, $name);
        }
        $news = News::create($requestData);

        if ($request->has('tag')) {
            foreach ($request->tag as $key => $item) {
                $newsTag = new NewsTag();
                $newsTag->tag_id = $item;
                $newsTag->news_id = $news->id;
                $newsTag->save();
            }
        }

        Session::flash('success', 'Thêm mới thành công');

        return redirect('admin/news');
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
        $list = Category::where('is_deleted', false)->where('type', 2)->get();
        $news = News::where('is_deleted', false)->where('id', $id)->first();
        $tag = Tag::where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $newsTag = NewsTag::where('news_id', $id)->get();
        $newT = null;
        foreach ($newsTag as $item) {
            $newT[$item->tag_id] = $item->tag_id;
        }

        return view('admin.news.edit', ['list' => $list, 'news' => $news, 'tag' => $tag, 'newsTag' => $newT ]);
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
        $this->validate($request, [
            'title' => 'required',
            'thumbnail' => 'mimes:jpeg,bmp,png',
            'content' => 'required'
        ], [
            'title.required' => 'Tiêu đề không được để trống',
            'thumbnail.mimes' => 'Định dạng ảnh không hợp lệ ( phải là jpeg,bmp,png)',
            'content.required' => 'Nội dung không được để trống'
        ]);
        $news = News::findOrFail($id);
        $requestData = $request->all();
        $requestData['slug'] = Helper::slug($requestData['title']);
        $requestData['category_id'] = $request->category_id;
        $requestData['status'] = isset($request->status) ? 1 :0;
        if ($request->hasFile('thumbnail')) {
            $name = md5(($request->file('thumbnail')->getClientOriginalName()).date('Y-m-d H:i:s')).'.'. $request->file('thumbnail')->getClientOriginalExtension();
            $public_path = public_path('uploads/news');
            $requestData['thumbnail'] = $name;
            $move = $request->file('thumbnail')->move($public_path, $name);
        }
        $news->update($requestData);

        $newsTag = NewsTag::where('news_id', $id)->get();
        foreach ($newsTag as $item) {
            $item->delete();
        }
        if ($request->has('tag')) {
            foreach ($request->tag as $key => $item) {
                $newsTag = new NewsTag();
                $newsTag->tag_id = $item;
                $newsTag->news_id = $news->id;
                $newsTag->save();
            }
        }

        Session::flash('success', 'Cập nhật thành công');

        return redirect('admin/news');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);
        $new->is_deleted = 1;
        $new->save();
        Session::flash('success', 'Xóa"' . $new->title . '" thành công');

        return redirect('admin/news');
    }
}
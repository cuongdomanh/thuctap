<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
use Session;
use Helper;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Slide::where('is_deleted', false);
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $list = $list->where('title', 'like', "%$keyword%");
        }
        $list = $list->orderBy('id', 'DESC')->paginate(10);

        return view('admin.slide.list', ['list' => $list])
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'images' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['status'] = isset($requestData['status']) ? true : false;
        if ($request->hasFile('images')) {
            $name = md5(($request->file('images')->getClientOriginalName())
                    . date('Y-m-d H:i:s'))
                . '.' . $request->file('images')->getClientOriginalExtension();
            $public_path = public_path('uploads/slides');
            $requestData['image'] = 'uploads/slides/' . $name;
            $move = $request->file('images')->move($public_path, $name);
        }
        Slide::create($requestData);

        return redirect('admin/slide');
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
        $slide = Slide::where('is_deleted', '0')->where('id', $id)->first();
        return view('admin.slide.edit', ['slide' => $slide]);
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
        $slide = Slide::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['status'] = isset($requestData['status']) ? true : false;
        if ($request->hasFile('images')) {
            unlink($slide->image);
            $name = md5(($request->file('images')->getClientOriginalName())
                    . date('Y-m-d H:i:s'))
                . '.' . $request->file('images')->getClientOriginalExtension();
            $public_path = public_path('uploads/slides');
            $requestData['image'] = 'uploads/slides/' . $name;
            $move = $request->file('images')->move($public_path, $name);
        }
        $slide->update($requestData);

        Session::flash('success', 'Cập nhật thành công');
        return redirect('admin/slide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        unlink($slide->image);
        $slide->is_deleted = 1;
        $slide->save();
        Session::flash('success', 'Xóa"' . $slide->title . '" thành công');

        return redirect('/admin/slide');
    }
}

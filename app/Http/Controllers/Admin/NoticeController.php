<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Mail;
use App\User;
use App\Subscribe;
use App\Notice;


class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = DB::table('notices');
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $list = $list->where('title', 'like', "%$keyword%");
        }
        $list = $list->orderBy('id', 'DESC')->paginate(10);
        return view('admin.notice.list', ['list' => $list])
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcribe = Subscribe::select('email')->get();
        $user=User::select('email')
            ->where('is_deleted',false)
            ->where('is_activated',1)
            ->where('active_role',0)->get();

        $this->validate($request, [
            'content1' => 'required',
            'title' => 'required'
        ]);

        $data = array(
            'title' => $request->title,
            'content' => $request->content1
        );

        $notice = new Notice;
        $requestData = $request->all();
        $notice = $notice::create($requestData);

        $notice->save();

        foreach ($subcribe as $item) {
            $data['email'][]=$item->email;
        }
        foreach ($user as $item) {
            $data['email'][]=$item->email;
        }
        Mail::send('admin.emails.email', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject($data['title']);
        });

        \Session::flash('success', 'Mail đã gửi thành công');

        return redirect('admin/notice');
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

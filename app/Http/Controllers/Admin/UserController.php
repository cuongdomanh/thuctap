<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Session;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = User::where('is_deleted', false)->where('active_role', 1);

        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $list = $list->where(
                function ($query) use ($keyword) {
                    $query->orWhere('name', 'like', "%$keyword%")
                        ->orWhere('email', 'like', "%$keyword%");
                }
            );

        }
        $list = $list->orderBy('id', 'DESC')->paginate(10);

        return view('admin.user.list', ['list' => $list])
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function member(Request $request)
//    {
//        $testMember = 1;
//        $list = User::where('is_deleted', false)->where('active_role', 0);
//        if ($request->has('keyword')) {
//            $keyword = $request->get('keyword');
//            $list = $list->where(
//                function ($query) use ($keyword) {
//                    $query->orWhere('name', 'like', "%$keyword%")
//                        ->orWhere('email', 'like', "%$keyword%");
//                }
//            );
//
//        }
//        $list = $list->orderBy('id', 'DESC')->paginate(10);
//
//        return view('admin.user.list', compact('list', 'testMember'))
//            ->with('i', ($request->input('page', 1) - 1) * 5);
//    }

    public function create()
    {
        $roles = Role::pluck('display_name', 'id')->all();

        return view('admin.user.create', ['roles' => $roles]);
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',

        ]);

        $requestData = $request->all();
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = md5(($file) . date('Y-m-d H:i:s')) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/user/'), $name);
            $requestData['thumbnail'] = 'uploads/user/' . $name;
        }
        $requestData['password'] = Hash::make($requestData['password']);
        $requestData['is_activated'] = isset($requestData['is_activated']) ? true : false;
        $requestData['active_role'] = 1;
        $user = User::create($requestData);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        Session::flash('success', 'Thêm mới thành công');

        return redirect('admin/user');
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
        $user = User::where('id', $id)
            ->where('is_deleted', '0')
            ->first();

        $userRole = $user->roles->pluck('id', 'id')->toArray();
        $roles = Role::pluck('display_name', 'id')->all();

        return view('admin.user.edit',
            ['user' => $user,
                'roles' => $roles,
                'userRole' => $userRole]);
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
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'password' => 'same:password_confirmation',
            'roles' => 'required'
        ]);

        $requestData = $request->all();
        if ($request->hasFile('thumbnail')) {
            if (file_exists($user->thumbnail)) {
                unlink($user->thumbnail);
            }
            $file = $request->file('thumbnail');
            $name = md5(($file) . date('Y-m-d H:i:s')) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/user'), $name);
            $requestData['thumbnail'] = 'uploads/user/' . $name;
        }
        $requestData['password'] = ($requestData['password'] != '') ? Hash::make($requestData['password']) : $user->password;
        $requestData['is_activated'] = isset($requestData['is_activated']) ? true : false;
        $user->update($requestData);

        DB::table('role_user')->where('user_id', $id)->delete();
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        Session::flash('success', 'Cập nhập "' . $user->name . '" thành công');

        return redirect('admin/user');
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
        $user = User::findOrFail($id);
        $user->is_deleted = 1;
        $user->delete();
        $user->save();
        Session::flash('success', 'Xóa "' . $user->name . '" thành công');

        return redirect()->back();
    }
}

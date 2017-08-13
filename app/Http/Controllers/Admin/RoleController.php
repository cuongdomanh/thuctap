<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use DB;
use Session;
use Module;
use App\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Role::orderBy('id', 'DESC');
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $list = $list->where('name', 'like', "%$keyword%");
        }
        $list = $list->paginate(5);
        return view('admin.role.list', ['list' => $list])
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = [];
        foreach (Module::all() as $item) {
            if ($item['permission'] != null) {
                $permission['title'] = $item['title'];
                $permission['items'] = Permission::where('module', $item['slug'])->get();
                $permissions[] = $permission;
            }
        }

        return view('admin.role.create', ['permissions' => $permissions]);
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
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }
        Session::flash('success', 'Thêm mới thành công.');

        return redirect('admin/role');
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
        $role = Role::findOrFail($id);

        $permissions = [];
        foreach (Module::all() as $item) {
            if ($item['permission'] != null) {
                $permission['title'] = $item['title'];
                $permission['items'] = Permission::where('module', $item['slug'])->get();
                $permissions[] = $permission;
            }
        }

        $rolePermissions = DB::table("permission_role")
            ->where("permission_role.role_id", $id)
            ->pluck("permission_role.permission_id", "permission_role.permission_id")
            ->all();

        return view('admin.role.edit',
            ['role' => $role,
                'permissions' => $permissions,
                'rolePermissions' => $rolePermissions]);
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
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        DB::table("permission_role")->where("permission_role.role_id", $id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }
        Session::flash('success', 'Cập nhật thành công.');

        return redirect('admin/role');
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
        $role = Role::findOrFail($id);
        $role->delete();
        Session::flash('success', 'Xóa thành công.');

        return redirect('admin/role');
    }
}

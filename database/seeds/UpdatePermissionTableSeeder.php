<?php

use Illuminate\Database\Seeder;
use App\Permission;

class UpdatePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            if ($permission->module == null) {
                $module = explode('-', $permission->name);
                $permission->module = $module[0];
            }

            $permission->display_name = ucwords(strtolower($permission->display_name));
            $permission->save();
        }
    }
}

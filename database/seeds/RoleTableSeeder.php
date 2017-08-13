<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $roles = [
            [
                'id'           => 1,
                'name'         => 'Admin',
                'display_name' => 'Administrator',
                'description'  => 'Administrator Role',
                'created_at'   => '2017-01-22 10:03:30',
                'updated_at'   => '2017-01-22 10:03:30',
            ],
            [
                'id'           => 2,
                'name'         => 'Writer',
                'display_name' => 'Writer',
                'description'  => 'Writer Role',
                'created_at'   => '2017-01-22 10:03:30',
                'updated_at'   => '2017-01-22 10:03:30',
            ]
        ];

        foreach ( $roles as $value ) {
            Role::create( $value );
        }

        $role_users = [
            [ 'user_id'   => 1, 'role_id'   => 1 ],
            [ 'user_id'   => 2, 'role_id'   => 2 ]
        ];
        foreach ($role_users as $value) {
            DB::table('role_user')->insert($value);
        }

        $permission_role = [
            [ 'permission_id'   => 1, 'role_id'   => 1 ],
            [ 'permission_id'   => 2, 'role_id'   => 1 ],
            [ 'permission_id'   => 3, 'role_id'   => 1 ],
            [ 'permission_id'   => 4, 'role_id'   => 1 ],
            [ 'permission_id'   => 5, 'role_id'   => 1 ],
            [ 'permission_id'   => 6, 'role_id'   => 1 ],
            [ 'permission_id'   => 7, 'role_id'   => 1 ],
            [ 'permission_id'   => 8, 'role_id'   => 1 ],
            [ 'permission_id'   => 5, 'role_id'   => 2 ],
            [ 'permission_id'   => 6, 'role_id'   => 2 ],
        ];
        foreach ($permission_role as $value) {
            DB::table('permission_role')->insert($value);
        }
    }
}

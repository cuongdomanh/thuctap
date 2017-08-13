<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $users = [
            [
                'id'           => 1,
                'name'         => 'administrator',
                'email'        => 'administrator@gmail.com',
                'password'     => '$2y$10$1EqpS3JlmFoUmaVjbrF2heLtr24o.eWMWVtHSe/FZA1uWEbQpDDsq',
                'is_activated' => 1,
                'created_at'   => '2017-01-22 05:43:38',
                'updated_at'   => '2017-01-22 10:41:12',
            ],
            [
                'id'           => 2,
                'name'         => 'tester',
                'email'        => 'tester@gmail.com',
                'password'     => '$2y$10$1EqpS3JlmFoUmaVjbrF2heLtr24o.eWMWVtHSe/FZA1uWEbQpDDsq',
                'is_activated' => 1,
                'created_at'   => '2017-01-22 05:43:38',
                'updated_at'   => '2017-01-22 10:41:12',
            ]
        ];

        foreach ( $users as $value ) {
            User::create( $value );
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Helpers\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Module::all() as $item) {
            if ($item['permission'] != null) {
                foreach ($item['permission'] as $permission) {
                    if (Permission::where('name', $permission)->count() <= 0) {
                        Permission::create([
                            'name'         => $permission,
                            'module'       => $item['slug'],
                            'display_name' => strtoupper(str_replace('-', ' ', $permission)),
                            'description'  => 'Permission ' . $permission .' for ' . $item['slug'] . ' module'
                        ]);
                    }
                }
            }
        }
    }
}

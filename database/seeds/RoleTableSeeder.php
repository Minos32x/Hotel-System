<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Role::create(['guard_name' => 'employee', 'name' => 'admin']);
         Role::create(['guard_name' => 'employee', 'name' => 'manager']);
         Role::create(['guard_name' => 'employee', 'name' => 'receptionist']);
    }
}

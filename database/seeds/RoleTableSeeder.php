<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'manger',
            'guard_name' => 'employee',
            
        ]);
        DB::table('roles')->insert([
            'name' => 'receptionist',
            'guard_name' => 'employee',
            
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
            'guard_name' => 'employee',
            
        ]);
    }
}

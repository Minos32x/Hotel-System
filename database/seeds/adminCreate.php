<?php

use Illuminate\Database\Seeder;
use App\Employee;

class adminCreate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add = new Employee;
        $add->name ="Admin";
        $add->email ="admin@admin.com";
        $add->password=Hash::make("123456");
        $add->national_id= now();
        $add->type='admin';
        $add->save();


    }
}

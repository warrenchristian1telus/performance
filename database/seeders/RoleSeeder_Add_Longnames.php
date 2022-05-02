<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder_Add_Longnames extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')
        ->where('id', '=', 1)
        ->update(['longname' => 'Employee']);
        DB::table('roles')
        ->where('id', '=', 2)
        ->update(['longname' => 'Supervisor']);
        DB::table('roles')
        ->where('id', '=', 3)
        ->update(['longname' => 'HR Administrator']);
        DB::table('roles')
        ->where('id', '=', 4)
        ->update(['longname' => 'System Administrator']);
    }
}

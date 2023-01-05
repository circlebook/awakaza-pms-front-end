<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@circlepos.lk',
            'password'=>Hash::make('1234'),
            'userId'=>Str::random(7),
            'role'=>'Admin',
            'phone'=>'0772345634',
            'isActive'=>1,
        ]);

    }
}

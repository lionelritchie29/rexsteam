<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Lionel Ritchie',
            'username' => 'lionel',
            'password' => Hash::make('lionel'),
            'level' => 1,
            'role_id' => 1,
            'picture_path' => 'images/users/default.jpg'
        ]);

        DB::table('users')->insert([
            'fullname' => 'Mai',
            'username' => 'mai',
            'password' => Hash::make('mai'),
            'level' => 1,
            'role_id' => 2,
            'picture_path' => 'images/users/default.jpg'
        ]);
    }
}

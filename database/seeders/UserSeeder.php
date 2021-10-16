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
            'fullname' => 'Emilia',
            'username' => 'emilia',
            'password' => Hash::make('emilia'),
            'level' => 1,
            'role_id' => 2,
            'picture_path' => 'images/users/default.jpg'
        ]);

        DB::table('users')->insert([
            'fullname' => 'Mai',
            'username' => 'sakurajima',
            'password' => Hash::make('sakurajima'),
            'level' => 1,
            'role_id' => 2,
            'picture_path' => 'images/users/default.jpg'
        ]);

        DB::table('users')->insert([
            'fullname' => 'Kassandra',
            'username' => 'kassandra',
            'password' => Hash::make('kassandra'),
            'level' => 1,
            'role_id' => 2,
            'picture_path' => 'images/users/default.jpg'
        ]);

        DB::table('users')->insert([
            'fullname' => 'Ellie',
            'username' => 'ellietlou',
            'password' => Hash::make('ellietlou'),
            'level' => 1,
            'role_id' => 2,
            'picture_path' => 'images/users/default.jpg'
        ]);

        DB::table('users')->insert([
            'fullname' => 'Kaede',
            'username' => 'kaede',
            'password' => Hash::make('kaede99'),
            'level' => 1,
            'role_id' => 2,
            'picture_path' => 'images/users/default.jpg'
        ]);

        DB::table('users')->insert([
            'fullname' => 'Nezuko',
            'username' => 'nezuko',
            'password' => Hash::make('nezuko'),
            'level' => 1,
            'role_id' => 2,
            'picture_path' => 'images/users/default.jpg'
        ]);

        DB::table('users')->insert([
            'fullname' => 'Shinobu Kocho',
            'username' => 'shinobu',
            'password' => Hash::make('shinobu'),
            'level' => 1,
            'role_id' => 2,
            'picture_path' => 'images/users/default.jpg'
        ]);
    }
}

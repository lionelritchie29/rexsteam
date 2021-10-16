<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friend_requests')->insert([
           'sender_user_id' => 2,
           'target_user_id' => 3,
            'status' => 'pending'
        ]);

        DB::table('friend_requests')->insert([
            'sender_user_id' => 2,
            'target_user_id' => 4,
            'status' => 'pending'
        ]);

        DB::table('friend_requests')->insert([
            'sender_user_id' => 5,
            'target_user_id' => 2,
            'status' => 'pending'
        ]);

        DB::table('friend_requests')->insert([
            'sender_user_id' => 2,
            'target_user_id' => 6,
            'status' => 'accepted'
        ]);

        DB::table('friend_requests')->insert([
            'sender_user_id' => 2,
            'target_user_id' => 7,
            'status' => 'accepted'
        ]);
    }
}

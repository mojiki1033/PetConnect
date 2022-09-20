<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert(
            [
                [
                    'name' =>'Test user1',
                    'email' =>'mail@address1',
                    'password' => Hash::make('testpass1'),
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'name' =>'Test user2',
                    'email' =>'mail@address2',
                    'password' => Hash::make('testpass2'),
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
            ]
        );
    }
}

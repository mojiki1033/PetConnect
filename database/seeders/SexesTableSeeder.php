<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sexes")->insert(
            [
                [
                    'name'=>'オス',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'name'=>'メス',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
            ]
        );
    }
}

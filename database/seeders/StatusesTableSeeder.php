<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("statuses")->insert(
            [
                [
                    'name'=>'引き取り主募集中',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'name'=>'募集一時停止中',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'name'=>'マッチング成立',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
            ]
        );
    }
}

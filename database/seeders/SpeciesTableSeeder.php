<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("species")->insert(
            [
                [
                    'name'=>'犬',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'name'=>'猫',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'name'=>'小動物',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'name'=>'鳥類',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'name'=>'爬虫類',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'name'=>'その他',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
            ]
        );
    }
}

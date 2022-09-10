<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusesTableSeeder::class);
        $this->call(SexesTableSeeder::class);
        $this->call(SpeciesTableSeeder::class);
        $this->call(PrefecturesTableSeeder::class);
    }
}

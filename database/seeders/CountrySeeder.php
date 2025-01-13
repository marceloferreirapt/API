<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            ['name' => 'United States'],
            ['name' => 'Canada'],
            ['name' => 'Brazil'],
            ['name' => 'United Kingdom'],
            ['name' => 'Australia'],
        ];

        DB::table('countries')->insert($countries);
    }
}

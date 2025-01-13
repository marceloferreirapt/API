<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // Use bcrypt to hash the password
            'isActive' => true,
            'country_id' => 1
        ]);
    }
}

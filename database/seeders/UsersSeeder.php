<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Anna',
            'last_name' => 'Campbell',
            'email' => 'anna.campbell@testmail.test',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Hamilton',
            'email' => 'john.ham@testmail.test',
            'password' => Hash::make('12345678')
        ]);
    }
}

<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nom' => 'SAWADOGO Moussa',
            'email' => 'sawadmous19@gmail.com',
            'login' => 'moses',
            'password' => Hash::make('password'),
        ]);
    }
}

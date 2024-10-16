<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);
    }
}

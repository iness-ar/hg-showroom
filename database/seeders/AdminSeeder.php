<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
       public function run(): void
    {
        User::create([
            'name' => 'Admin Showroom 1',
            'email' => 'adminshowroom@gmail.com',
            'password' => Hash::make('password123'), 
        ]);
        User::create([
            'name' => 'Admin Showroom 2',
            'email' => 'adminshowroom2@gmail.com',
            'password' => Hash::make('password123'), 
        ]);
    }

}

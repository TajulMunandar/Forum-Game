<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bang Admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => '1',
        ]);
        User::create([
            'name' => 'Bang Gamer',
            'username' => 'gamer',
            'password' => Hash::make('gamer'),
            'role' => '2',
        ]);
    }
}

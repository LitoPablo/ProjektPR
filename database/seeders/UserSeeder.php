<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'Admin@mail.com',
            'password' => Hash::make('asdasdasd'),
        ]);
        User::create([
            'name' => 'Test',
            'email' => 'Test@mail.com',
            'password' => Hash::make('asdasdasd'),
        ]);
    }
}

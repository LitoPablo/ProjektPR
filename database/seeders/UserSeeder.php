<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::findByName('admin');
        
        $user = User::create([
            'name' => 'Admin',
            'email' => 'Admin@mail.com',
            'password' => Hash::make('asdasdasd'),
        ]);
        if(isset($adminRole)){ $user->assignRole($adminRole); }

        User::create([
            'name' => 'Test',
            'email' => 'Test@mail.com',
            'password' => Hash::make('asdasdasd'),
        ]);
    }
}

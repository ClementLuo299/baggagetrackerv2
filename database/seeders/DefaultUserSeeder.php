<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create admin
        $admin = User::create([
            'name' => 'admin',
            'password' => Hash::make('password'),
            'fname' => 'Server',
            'lname' => 'Admin'
        ]);
        $admin->assignRole('Admin');
    }
}

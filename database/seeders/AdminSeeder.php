<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'name' => 'Admin User',
            'position' => 'Administrator',
            'department' => 'Administration',
            'status' => 'active',
        ]);

        $adminUser->assignRole('admin', 'recruiter', 'user');
    }
}

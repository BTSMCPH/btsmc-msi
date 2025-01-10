<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'k.tallod@btsmcph.com',
            'password' => Hash::make('@btsmcph2025'),
            'name' => 'Khenny Mart Tallod',
            'position' => 'Recruitment Lead',
            'department' => 'HR',
            'status' => 'active',
        ]);

        $user->assignRole('recruiter');
    }
}

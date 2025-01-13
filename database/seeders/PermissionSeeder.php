<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions array
        $permissions = [
            'view_vacancy_banner',
            'view_user_message',
            'view_jobs',
            'view_account',
            'test',
            'restore_vacancy_banner',
            'force_delete_vacancy_banner',
            'edit_vacancy_banner',
            'edit_jobs',
            'edit_account',
            'delete_vacancy_banner',
            'delete_jobs',
            'delete_account',
            'create_vacancy_banner',
            'create_jobs',
            'create_account',
        ];

        // Seed the permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

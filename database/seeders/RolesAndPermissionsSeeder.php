<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Admin', 'slug' => 'admin']);
        $editor = Role::create(['name' => 'Editor', 'slug' => 'editor']);

        $permissions = [
            ['name' => 'Edit Post', 'slug' => 'edit-post'],
            ['name' => 'Delete Post', 'slug' => 'delete-post'],
            ['name' => 'Manage Users', 'slug' => 'manage-users'],
        ];

        foreach ($permissions as $permission) {
            $perm = Permission::create($permission);
            $admin->permissions()->attach($perm); // Assign all permissions to Admin
        }

        $editor->permissions()->attach(Permission::where('slug', 'edit-post')->first());
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role as ModelsRole;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = ModelsRole::create(['name' => 'admin']);
        $recruiter = ModelsRole::create(['name' => 'recruiter']);
        $user = ModelsRole::create(['name' => 'user']);
    }
}

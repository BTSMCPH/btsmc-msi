<?php

namespace App\Services;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

class RolePermissionService
{
    /**
     * Get roles with search, ordering, and pagination.
     *
     * @param  array  $filters
     * @param  int    $length
     * @param  int    $page
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getRoles(array $filters, int $length, int $page): LengthAwarePaginator
    {
        $orderColumnIndex = $filters['order'][0]['column'] ?? 0;
        $orderDirection = $filters['order'][0]['dir'] ?? 'asc';
        $searchValue = $filters['search']['value'] ?? '';

        // Get the column name from the DataTable
        $columns = ['name', 'guard_name', 'actions'];
        $orderColumn = $columns[$orderColumnIndex] ?? 'name';

        $query = Role::with('permissions');

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'like', "%{$searchValue}%")
                    ->orWhere('guard_name', 'like', "%{$searchValue}%");
            });
        }

        $query->orderBy($orderColumn, $orderDirection);

        return $query->paginate($length, ['*'], 'page', $page);
    }

    /**
     * Map the roles to a data format for DataTables.
     *
     * @param  \Illuminate\Pagination\LengthAwarePaginator  $roles
     * @return array
     */
    public function mapRolesForDataTable($roles): array
    {
        return $roles->map(function ($role) {
            $permissions = $role->permissions->pluck('name')->map(function ($permission) {
                $class = '';

                // Determine class based on the first word of the permission
                $firstWord = explode(' ', $permission)[0];
                switch ($firstWord) {
                    case 'create':
                        $class = 'text-white bg-green-500';
                        break;
                    case 'edit':
                        $class = 'text-blue-800 bg-blue-500';
                        break;
                    case 'delete':
                        $class = 'text-white bg-red-600';
                        break;
                    case 'view':
                        $class = 'text-gray-800 bg-gray-500';
                        break;
                    default:
                        $class = 'text-indigo-800 bg-indigo-500';
                }

                return '<span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full ' . $class . '">' . $permission . '</span>';
            })->implode(' ');

            return [
                'id' => $role->id,
                'name' => $role->name,
                'guard_name' => $role->guard_name,
                'permissions' => $permissions,
                'actions' => view('admin.pages.admin-settings.roles.action.actions', compact('role'))->render(),
            ];
        })->toArray();
    }

    /**
     * Get permissions with search, ordering, and pagination.
     *
     * @param  array  $filters
     * @param  int    $length
     * @param  int    $page
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPermissions(array $filters, int $length, int $page): LengthAwarePaginator
    {
        $orderColumnIndex = $filters['order'][0]['column'] ?? 0;
        $orderDirection = $filters['order'][0]['dir'] ?? 'asc';
        $searchValue = $filters['search']['value'] ?? '';

        // Get the column name from the DataTable
        $columns = ['name', 'guard_name', 'actions'];
        $orderColumn = $columns[$orderColumnIndex] ?? 'name';

        $query = Permission::query();

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where('name', 'like', "%{$searchValue}%")
                ->orWhere('guard_name', 'like', "%{$searchValue}%");
        }

        $query->orderBy($orderColumn, $orderDirection);

        return $query->paginate($length, ['*'], 'page', $page);
    }

    /**
     * Map the permissions to a data format for DataTables.
     *
     * @param  \Illuminate\Pagination\LengthAwarePaginator  $permissions
     * @return array
     */
    public function mapPermissionsForDataTable($permissions): array
    {
        return $permissions->map(function ($permission) {
            return [
                'id' => $permission->id,
                'name' => $permission->name,
                'guard_name' => $permission->guard_name,
                'actions' => view('admin.pages.admin-settings.permissions.action.actions', compact('permission'))->render(),
            ];
        })->toArray();
    }

    /**
     * Attach a permission to a role.
     *
     * @param  Role  $role
     * @param  Permission  $permission
     * @return void
     */
    public function attachPermission(Role $role, Permission $permission): void
    {
        $role->permissions()->attach($permission);
    }

    /**
     * Detach a permission from a role.
     *
     * @param  Role  $role
     * @param  Permission  $permission
     * @return void
     */
    public function detachPermission(Role $role, Permission $permission): void
    {
        $role->permissions()->detach($permission);
    }

    /**
     * Check if a role has a specific permission.
     *
     * @param  Role  $role
     * @param  Permission  $permission
     * @return bool
     */
    public function hasPermission(Role $role, Permission $permission): bool
    {
        return $role->permissions->contains($permission);
    }
}

<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    /**
     * Get users with search, ordering, and pagination.
     *
     * @param  array  $filters
     * @param  int    $length
     * @param  int    $page
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getUsers(array $filters, int $length, int $page): LengthAwarePaginator
    {
        $orderColumnIndex = $filters['order'][0]['column'] ?? 0;
        $orderDirection = $filters['order'][0]['dir'] ?? 'desc';
        $searchValue = $filters['search']['value'] ?? '';

        // Get the column name from the DataTable
        $columns = ['id', 'name', 'email', 'position', 'department', 'status', 'roles', 'actions'];
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';

        $query = User::query();

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'like', "%{$searchValue}%")
                    ->orWhere('email', 'like', "%{$searchValue}%")
                    ->orWhere('position', 'like', "%{$searchValue}%")
                    ->orWhere('department', 'like', "%{$searchValue}%")
                    ->orWhere('status', 'like', "%{$searchValue}%");
            });
        }

        // Apply ordering
        $query->orderBy($orderColumn, $orderDirection);

        // Apply pagination
        $users = $query->with('roles')->paginate($length, ['*'], 'page', $page);

        return $users;
    }


    /**
     * Map the users to a data format for DataTables.
     *
     * @param  \Illuminate\Pagination\LengthAwarePaginator  $users
     * @return array
     */
    public function mapUsersForDataTable($users): array
    {
        return $users->map(function ($user) {
            $roles = $user->roles->map(function ($role) {
                switch ($role->name) {
                    case 'admin':
                        $class = 'inline-block px-2 py-1 text-xs font-medium text-white bg-blue-500 rounded-full';
                        break;
                    case 'editor':
                        $class = 'inline-block px-2 py-1 text-xs font-medium text-white bg-green-500 rounded-full';
                        break;
                    case 'user':
                            $class = 'inline-block px-2 py-1 text-xs font-medium text-gray-800 bg-gray-200 rounded-full';
                            break;
                    case 'hr':
                        $class = 'inline-block px-2 py-1 text-xs font-medium text-white bg-yellow-500 rounded-full';
                        break;
                    default:
                        $class = 'inline-block px-2 py-1 text-xs font-medium text-gray-800 bg-gray-200 rounded-full';
                }

                return "<span class=\"$class\">{$role->name}</span>";
            })->join(' ');

            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'position' => $user->position,
                'department' => $user->department,
                'status' => $this->generateStatusToggle($user),
                'roles' => $roles,
                'actions' => view('admin.pages.admin-settings.accounts.action.actions', compact('user'))->render(),
            ];
        })->toArray();
    }

    /**
     * Generate the status toggle button for a user.
     */
    private function generateStatusToggle($user): string
    {
        $status = $user->status == 'active' ? 'checked' : '';
        $toggleButton = '<label class="switch">
                            <input type="checkbox" class="status-toggle-user" data-user-id="' . $user->id . '" ' . $status . '>
                            <span class="slider"></span>
                        </label>';

        return $toggleButton;
    }

    /**
     * Create a new user.
     */
    public function createUser(array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    /**
     * Update an existing user.
     */
    public function updateUser(User $user, array $data): bool
    {
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        return $user->update($data);
    }

    /**
     * Delete a user.
     */
    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }

    /**
     * Restore a soft-deleted user.
     */
    public function restoreUser(User $user): bool
    {
        return $user->restore();
    }

    /**
     * Permanently delete a user.
     */
    public function forceDeleteUser(User $user): bool
    {
        return $user->forceDelete();
    }

    /**
     * Update the status of a user.
     */
    public function updateUserStatus(User $user, string $status): bool
    {
        $user->status = $status;
        return $user->save();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $length = $request->get('length', 10);
            $start = $request->get('start', 0);
            $page = ($start / $length) + 1;

            $filters = $request->all();
            // $showTrashed = $request->get('showTrashed', false);

            $users = $this->userService->getUsers($filters, $length, $page);

            $data = $this->userService->mapUsersForDataTable($users);

            return response()->json([
                'data' => $data,
                'recordsTotal' => $users->total(),
                'recordsFiltered' => $users->total(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
            ]);
        }

        return view('admin.pages.admin-settings.accounts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.admin-settings.accounts.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
        ]);

        $user = $this->userService->createUser($validated);

        $role = Role::find($validated['role']);
        $user->assignRole($role);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return view('admin.pages.admin-settings.accounts.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.pages.admin-settings.accounts.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'nullable|string|exists:roles,id',
        ]);

        $this->userService->updateUser($user, $validated);

        if (isset($validated['role'])) {
            $role = Role::find($validated['role']);
            $user->syncRoles($role);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        $this->userService->deleteUser($user);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
        }

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Update the status of the user account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, User $user, UserService $userService)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $updated = $userService->updateUserStatus($user, $validated['status']);

        if ($updated) {
            return response()->json(['message' => 'User status updated successfully.']);
        }

        return response()->json(['message' => 'Failed to update user status.'], 500);
    }

}

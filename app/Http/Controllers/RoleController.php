<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\RolePermissionService;

class RoleController extends Controller
{
    protected $RolePermissionService;

    public function __construct(RolePermissionService $RolePermissionService)
    {
        $this->RolePermissionService = $RolePermissionService;
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

            $roles = $this->RolePermissionService->getRoles($filters, $length, $page);

            $data = $this->RolePermissionService->mapRolesForDataTable($roles);

            return response()->json([
                'data' => $data,
                'recordsTotal' =>$roles->total(),
                'recordsFiltered' => $roles->total(),
                'current_page' => $roles->currentPage(),
                'last_page' => $roles->lastPage(),
            ]);
        }

        return view('admin.pages.admin-settings.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.admin-settings.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
            'slug' => 'required|unique:roles|max:255',
        ]);

        Role::create($request->only(['name', 'slug']));

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.pages.admin-settings.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,' . $role->id,
            'slug' => 'required|max:255|unique:roles,slug,' . $role->id,
        ]);

        $role->update($request->only(['name', 'slug']));

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}

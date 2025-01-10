<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Services\RolePermissionService;

class PermissionController extends Controller
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

            $permissions = $this->RolePermissionService->getPermissions($filters, $length, $page);

            $data = $this->RolePermissionService->mapPermissionsForDataTable($permissions);

            return response()->json([
                'data' => $data,
                'recordsTotal' =>$permissions->total(),
                'recordsFiltered' => $permissions->total(),
                'current_page' => $permissions->currentPage(),
                'last_page' => $permissions->lastPage(),
            ]);
        }

        return view('admin.pages.admin-settings.permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.admin-settings.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|max:255',
            'slug' => 'required|unique:permissions|max:255',
        ]);

        Permission::create($request->only(['name', 'slug']));

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.pages.admin-settings.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|max:255|unique:permissions,name,' . $permission->id,
            'slug' => 'required|max:255|unique:permissions,slug,' . $permission->id,
        ]);

        $permission->update($request->only(['name', 'slug']));

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.admin-settings.accounts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $role)
    {
        //
    }
}

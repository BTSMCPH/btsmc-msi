<?php

namespace App\Http\Controllers;

use App\Models\VacancyContent;
use App\Http\Requests\StoreVacancyContentRequest;
use App\Http\Requests\UpdateVacancyContentRequest;

class VacancyContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.vacancy.content.index');
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
    public function store(StoreVacancyContentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VacancyContent $vacancyContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VacancyContent $vacancyContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacancyContentRequest $request, VacancyContent $vacancyContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VacancyContent $vacancyContent)
    {
        //
    }
}

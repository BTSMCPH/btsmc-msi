<?php

namespace App\Http\Controllers;

use App\Models\VacancyBanner;
use App\Http\Requests\StoreVacancyBannerRequest;
use App\Http\Requests\UpdateVacancyBannerRequest;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class VacancyBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancyBanner = VacancyBanner::first();
        return view('admin.pages.vacancy.vacancy-banner.vacancyIndex', compact('vacancyBanner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.vacancy.vacancy-banner.vacancyCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacancyBannerRequest $request)
    {
        $bannerData = $request->validated();

        if ($request->hasFile('image')) {
            $image =  $request->file('image');
            $path = $image->storeAs('vacancy_banners', time() . '.' . $image->getClientOriginalExtension(), 'public');
            $fullPath = public_path('storage/' . $path);

            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($fullPath);

            $bannerData['image_path'] = 'storage/' . $path;
        }

        VacancyBanner::create($bannerData);

        return redirect()->route('vacancy-banner.index')->with('success', 'Vacancy banner created successfully.');
    }

   /**
     * Display the specified resource.
     */
    public function show(VacancyBanner $vacancyBanner)
    {
        return view('vacancy_banner.show', compact('vacancyBanner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VacancyBanner $vacancyBanner)
    {
        return view('admin.pages.vacancy.vacancy-banner.vacancyEdit', compact('vacancyBanner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacancyBannerRequest $request, VacancyBanner $vacancyBanner)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->storeAs('vacancy_banners', time() . '.' . $image->getClientOriginalExtension(), 'public');
            $fullPath = public_path('storage/' . $path);
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($fullPath);

            if ($vacancyBanner->image_path && file_exists(public_path($vacancyBanner->image_path))) {
                unlink(public_path($vacancyBanner->image_path));
            }

            $validatedData['image_path'] = 'storage/' . $path;
        }

        $vacancyBanner->update($validatedData);

        return redirect()->route('vacancy-banner.index')->with('success', 'Vacancy banner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VacancyBanner $vacancyBanner)
    {
        if ($vacancyBanner->image_path && file_exists(public_path($vacancyBanner->image_path))) {
            unlink(public_path($vacancyBanner->image_path));
        }

        $vacancyBanner->delete();

        return redirect()->route('vacancy-banner.index')->with('success', 'Vacancy banner deleted successfully.');
    }
}

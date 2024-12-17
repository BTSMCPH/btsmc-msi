<?php

namespace App\Http\Controllers;

use App\Models\ContactBanner;
use App\Http\Requests\StoreContactBannerRequest;
use App\Http\Requests\UpdateContactBannerRequest;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class ContactBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactBanner = ContactBanner::first();
        return view('admin.pages.contact.banner.index', compact('contactBanner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.contact.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactBannerRequest $request)
    {
        $bannerData = $request->validated();

        if ($request->hasFile('image')) {
            $image =  $request->file('image');
            $path = $image->storeAs('contact_banners', time() . '.' . $image->getClientOriginalExtension(), 'public');
            $fullPath = public_path('storage/' . $path);

            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($fullPath);

            $bannerData['image_path'] = 'storage/' . $path;
        }

        ContactBanner::create($bannerData);

        return redirect()->route('contact-banner.index')->with('success', 'Contact banner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactBanner $contactBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactBanner $contactBanner)
    {
        return view('admin.pages.contact.banner.edit', compact('contactBanner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactBannerRequest $request, ContactBanner $contactBanner)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->storeAs('vacancy_banners', time() . '.' . $image->getClientOriginalExtension(), 'public');
            $fullPath = public_path('storage/' . $path);
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($fullPath);

            if ($contactBanner->image_path && file_exists(public_path($contactBanner->image_path))) {
                unlink(public_path($contactBanner->image_path));
            }

            $validatedData['image_path'] = 'storage/' . $path;
        }

        $contactBanner->update($validatedData);

        return redirect()->route('contact-banner.index')->with('success', 'Contact banner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactBanner $contactBanner)
    {
        //
    }
}

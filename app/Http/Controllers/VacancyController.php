<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Get length and start from the request
            $length = $request->get('length', 10);
            $start = $request->get('start', 0);
            $page = ($start / $length) + 1;

            // Fetch paginated data based on calculated page
            $vacancies = Vacancy::paginate($length, ['*'], 'page', $page);

            if ($vacancies->isEmpty()) {
                return response()->json([
                    'data' => [],
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'current_page' => 0,
                    'last_page' => 0
                ]);
            }

            // Map the paginated data
            $data = $vacancies->map(function ($vacancy) {
                return [
                    'vacancy_banner_image' => '<img src="' . asset('storage/' . $vacancy->vacancy_banner_image) . '" alt="Banner Image" class="object-cover w-16 h-16 rounded-lg">',
                    'vacancy_banner_title' => $vacancy->vacancy_banner_title,
                    'vacancy_banner_subtitle' => $vacancy->vacancy_banner_subtitle,
                    'actions' => '
                    <div class="flex items-center gap-3 justify-first">
                        <a href="' . route('vacancy.edit', $vacancy->id) . '" class="flex items-center text-yellow-500 hover:text-blue-700" style="color: rgb(234 179 8);" title="Edit Vacancy">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                        <form action="' . route('vacancy.destroy', $vacancy->id) . '" method="POST" class="inline-block">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="flex items-center text-red-500 hover:text-red-700" title="Delete Vacancy">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                ',
                ];
            });

            // Return paginated response
            return response()->json([
                'data' => $data,
                'recordsTotal' => $vacancies->total(),
                'recordsFiltered' => $vacancies->total(),
                'current_page' => $vacancies->currentPage(),
                'last_page' => $vacancies->lastPage(),
            ]);
        }

        return view('admin.pages.banners.vacancy-banner.vacancyIndex');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.banners.vacancy-banner.vacancyCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacancyRequest $request)
    {
        // Handle the uploaded file
        $imagePath = $request->file('vacancy_banner_image')->store('vacancies', 'public');

        // Create a new vacancy record
        $vacancy = Vacancy::create([
            'vacancy_banner_image' => $imagePath,
            'vacancy_banner_title' => $request->input('vacancy_banner_title'),
            'vacancy_banner_subtitle' => $request->input('vacancy_banner_subtitle'),
        ]);

        return redirect()->route('vacancy.index')->with('success', 'Vacancy created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        return view('admin.pages.banners.vacancy-banner.vacancyEdit', \compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        // Start a database transaction to ensure data integrity
        DB::beginTransaction();

        try {

            $vacancyData = $request->only([
                'vacancy_banner_title',
                'vacancy_banner_subtitle'
            ]);

            // If a new image is provided, store it and update the image field
            if ($request->hasFile('vacancy_banner_image')) {
                $vacancyData['vacancy_banner_image'] = $request->file('vacancy_banner_image')->store('vacancies', 'public');
            }

            $vacancy->update($vacancyData);

            // Commit the transaction
            DB::commit();

            return redirect()->route('vacancy.index')->with('success', 'Vacancy updated successfully.');
        } catch (\Exception $e) {
            // If something goes wrong, roll back the transaction
            DB::rollBack();

            Log::error('Error updating vacancy: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to update vacancy. Please try again.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }
}

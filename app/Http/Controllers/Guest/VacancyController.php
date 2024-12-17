<?php

namespace App\Http\Controllers\Guest;

use App\Models\Job;
use App\Models\Vacancy;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\VacancyBanner;
use App\Http\Controllers\Controller;
use App\Services\GuestVacancyService;

class VacancyController extends Controller
{
    protected $vacancyService;

    public function __construct(GuestVacancyService $vacancyService)
    {
        $this->vacancyService = $vacancyService;
    }

    public function index(Request $request): View
    {
        // Get categorized active jobs from the service
        $job_lists = $this->vacancyService->getActiveJobLists($request);

        $vacancyBanner = VacancyBanner::first();

        return view('pages.vacancy', ['job_lists' => $job_lists, 'vacancyBanner' => $vacancyBanner]);
    }
}

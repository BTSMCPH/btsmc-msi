<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Services\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
{
    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
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

            // Get jobs from the service
            $jobs = $this->jobService->getJobs($filters, $length, $page);

            // Map jobs to DataTable format
            $data = $this->jobService->mapJobsForDataTable($jobs);

            return response()->json([
                'data' => $data,
                'recordsTotal' => $jobs->total(),
                'recordsFiltered' => $jobs->total(),
                'current_page' => $jobs->currentPage(),
                'last_page' => $jobs->lastPage(),
            ]);
        }

        return view('admin.pages.jobs.jobIndex');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.jobs.jobCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        Job::create([
            'job_title' => $request->job_title,
            'job_type' => $request->job_type,
            'location' => $request->location,
            'schedule' => $request->schedule,
            'job_requirements' => $request->job_requirements,
            'job_description' => $request->job_description,
        ]);

        return redirect()->route('job.index')->with('success', 'Job created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        // \dd($job);
        return view('admin.pages.jobs.jobEdit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $data = $request->validated();

        $job->update($data);

        return redirect()->route('job.index')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('job.index')->with('success', 'Job deleted successfully.');
    }
}

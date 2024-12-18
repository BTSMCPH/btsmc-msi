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

        return view('admin.pages.vacancy.jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.vacancy.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $storeData = $request->validated();

        Job::create($storeData);

        return redirect()->route('job.index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\View\View
     */
    public function show(Job $job)
    {
        return view('admin.pages.vacancy.jobs.show', compact('job'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('admin.pages.vacancy.jobs.edit', compact('job'));
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

    /**
     * Update the status of the job.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Job $job)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $job->status = $validated['status'];
        $job->save();

        return response()->json(['status' => $job->status]);
    }
}

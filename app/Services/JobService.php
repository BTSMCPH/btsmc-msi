<?php

namespace App\Services;

use App\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;



class JobService
{
    /**
     * Get jobs with search, ordering, and pagination.
     *
     * @param  array  $filters
     * @param  int    $length
     * @param  int    $page
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getJobs(array $filters, int $length, int $page): LengthAwarePaginator
    {
        $orderColumnIndex = $filters['order'][0]['column'] ?? 0;
        $orderDirection = $filters['order'][0]['dir'] ?? 'asc';
        $searchValue = $filters['search']['value'] ?? '';

        // Get the column name from the DataTable
        $columns = ['job_title', 'job_type', 'location', 'schedule', 'job_requirements', 'job_description', 'category', 'status', 'actions'];
        $orderColumn = $columns[$orderColumnIndex] ?? 'job_title';

        $query = Job::query();

        // Apply search filter
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('job_title', 'like', "%{$searchValue}%")
                    ->orWhere('job_type', 'like', "%{$searchValue}%")
                    ->orWhere('location', 'like', "%{$searchValue}%")
                    ->orWhere('schedule', 'like', "%{$searchValue}%")
                    ->orWhere('job_requirements', 'like', "%{$searchValue}%")
                    ->orWhere('job_description', 'like', "%{$searchValue}%")
                    ->orWhere('category', 'like', "%{$searchValue}%")
                    ->orWhere('status', 'like', "%{$searchValue}%");
            });
        }

        // Apply ordering
        $query->orderBy($orderColumn, $orderDirection);

        // Apply pagination
        return $query->paginate($length, ['*'], 'page', $page);
    }

    /**
     * Map the jobs to a data format for DataTables.
     *
     * @param  \Illuminate\Pagination\LengthAwarePaginator  $jobs
     * @return array
     */
    public function mapJobsForDataTable($jobs): array
    {
        return $jobs->map(function ($job) {
            return [
                'job_title' => $job->job_title,
                'job_type' => $job->job_type,
                'location' => $job->location,
                'schedule' => $job->schedule,
                'job_requirements' => $job->job_requirements,
                'job_description' => $job->job_description,
                'category' => $job->category,
                'status' => $job->status,
                'actions' => '<div class="flex items-center gap-3 justify-first">
                    <a href="' . route('job.edit', $job->id) . '" class="flex items-center text-yellow-500 hover:text-blue-700" style="color: rgb(234 179 8);" title="Edit Jobs">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                    <form action="' . route('job.destroy', $job->id) . '" method="POST" class="inline-block">'
                        . csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="flex items-center text-red-500 hover:text-red-700" title="Delete Jobs">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>',
            ];
        })->toArray();
    }
}

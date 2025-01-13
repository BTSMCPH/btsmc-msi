<?php

namespace App\Services;

use App\Models\Job;
use Illuminate\Support\Str;
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
        $orderDirection = $filters['order'][0]['dir'] ?? 'desc';
        $searchValue = $filters['search']['value'] ?? '';

        // Get the column name from the DataTable
        $columns = ['id', 'job_title', 'job_type', 'location', 'schedule', 'job_requirements', 'job_description', 'category', 'status', 'actions'];
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';

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
                'job_requirements' => '<div class="truncate-ellipsis" title="' . $job->job_requirements . '">' . Str::limit(strip_tags($job->job_requirements), 50) . '</div>',
                'job_description' => '<div class="truncate-ellipsis" title="' . $job->job_description . '">' . Str::limit(strip_tags($job->job_description), 50) . '</div>',
                'category' => '<span class="inline-block text-center px-2 py-0.5 text-sm font-medium text-white rounded-full '
                    . (str_word_count($job->category) > 1 ? 'text-xs px-1' : 'text-xs px-2')
                    . ($job->category === 'TECHNICAL POSITION' ? ' bg-green-500'
                    : ($job->category === 'BACK OFFICE SUPPORT' ? ' bg-yellow-500'
                    : ' bg-gray-500'))
                    . '">' . $job->category . '</span>',
                'status' => $this->generateStatusToggle($job),
                'actions' => '<div class="flex items-center gap-2 justify-first">
                <div class="flex items-center justify-center">
                    <a href="' . route('job.edit', $job->id) . '" class="flex items-center text-yellow-500 hover:text-yellow-700" style="color: rgb(234 179 8);" title="Edit Jobs">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="'. route('job.show', $job->id)  .'" class="flex items-center text-blue-500 hover:text-blue-700" title="View Jobs">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <form action="' . route('job.destroy', $job->id) . '" method="POST" class="inline-block">'
                        . csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="flex items-center text-red-500 hover:text-red-700" title="Delete Jobs">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>',
            ];
        })->toArray();
    }

    /**
     * Generate the HTML for the status toggle.
     *
     * @param  \App\Models\Job  $job
     * @return string
     */
    private function generateStatusToggle($job): string
    {
        $status = $job->status == 'active' ? 'checked' : '';
        $toggleButton = '<label class="switch">
                            <input type="checkbox" class="status-toggle" data-job-id="' . $job->id . '" ' . $status . '>
                            <span class="slider"></span>
                        </label>';

        return $toggleButton;
    }
}

<?php

namespace App\Services;

use App\Models\Job;

class GuestVacancyService
{
    /**
     * Get categorized active jobs.
     *
     * @return array
     */
    public function getActiveJobLists(): array
    {
        // $jobs = Job::all();

        $categories = ['TECHNICAL POSITION', 'BACK OFFICE SUPPORT', 'INTERNS'];

        $job_lists = [];

        // foreach ($jobs as $job) {
        //     if ($job->status === 'active') {
        //         $category_name = $job->category;
        //         $job_lists[$category_name][] = [
        //             'id' => $job->id,
        //             'job_title' => $job->job_title,
        //         ];
        //     }
        // }

        foreach ($categories as $category) {
            // Generate a unique query parameter key for each category
            $queryKey = 'page_' . str_replace(' ', '_', $category);

            // Fetch paginated results for each category based on the specific query parameter
            $job_lists[$category] = Job::where('category', $category)
                                        ->where('status', 1)
                                        ->paginate(3, ['*'], $queryKey);
        }

        return $job_lists;
    }
}

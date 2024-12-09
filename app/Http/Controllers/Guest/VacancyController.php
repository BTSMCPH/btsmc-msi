<?php

namespace App\Http\Controllers\Guest;

use App\Models\Job;
use App\Models\Vacancy;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VacancyController extends Controller
{
    public function index(): View
    {

        // $jobs = Jobs::all();
        // $categories = Category::pluck('name', 'id')->toArray();

        // $job_lists = [];

        // foreach ($jobs as $job) {
        //     if (isset($categories[$job->category_id])) {
        //         $category_name = $categories[$job->category_id];
        //         $job_lists[$category_name][] = [
        //             'id' => $job->id,
        //             'job_title' => $job->title, // Replace 'title' with the actual field for the job title
        //         ];
        //     }
        // }



        $jobs = Job::all();

        $categories = ['TECHNICAL POSITION', 'BACK OFFICE SUPPORT', 'INTERNS'];

        $job_lists = array_fill_keys($categories, []);

        foreach ($jobs as $job) {
            $category_name = $job->category;

            $job_lists[$category_name][] = [
                'id' => $job->id,
                'job_title' => $job->job_title,
            ];


        }
        // dd($job_lists);

        // front end
    //     foreach($job_lists as $key => $jobs) {
    //         <h2> $key </h2>
    //          <ul>
    //           foreach($jobs as $job) {
    //               <li>$job->title</li>
    //           }
    //       </ul>
    //   }


        return view('pages.vacancy', ['job_lists' => $job_lists]);
    }
}

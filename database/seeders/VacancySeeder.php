<?php

namespace Database\Seeders;

use App\Models\Vacancy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('vacancies')->insert([
        //     [
        //         'vacancy_banner_image' => 'banner1.jpg',
        //         'vacancy_banner_title' => 'Join Our Team!',
        //         'vacancy_banner_subtitle' => 'We are hiring for various roles',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'vacancy_banner_image' => 'banner2.jpg',
        //         'vacancy_banner_title' => 'Your Future Starts Here',
        //         'vacancy_banner_subtitle' => 'Explore exciting opportunities with us',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]
        // ]);

        Vacancy::factory()->count(20)->create();
    }
}

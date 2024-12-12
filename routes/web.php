<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\Guest\AboutController as GuestAboutController;
use App\Http\Controllers\Guest\CareerController as GuestCareerController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Guest\VacancyController as GuestVacancyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyBannerController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Guest Routes
Route::get('/', [GuestHomeController::class, 'index'])->name('welcome');
Route::get('/about', [GuestAboutController::class, 'index'])->name('about');
ROute::get('/career', [GuestCareerController::class, 'index'])->name('career');
Route::get('/vacancies', [GuestVacancyController::class, 'index'])->name('vacancy');

// Authenticated Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('home',HomeController::class);
    Route::resource('about', AboutController::class);
    Route::resource('career', CareerController::class);

    Route::resource('vacancy', VacancyController::class);
    Route::resource('vacancy-banner', VacancyBannerController::class);
    Route::resource('job', JobController::class);

    // Custom route to update status
    Route::post('/job/update-status/{job}', [JobController::class, 'updateStatus'])->name('job.update-status');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});


require __DIR__.'/auth.php';

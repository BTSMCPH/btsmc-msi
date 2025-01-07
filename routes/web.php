<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ContactBannerController;
use App\Http\Controllers\VacancyBannerController;
use App\Http\Controllers\VacancyContentController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Guest\AboutController as GuestAboutController;
use App\Http\Controllers\Guest\CareerController as GuestCareerController;
use App\Http\Controllers\Guest\ContactController as GuestContactController;
use App\Http\Controllers\Guest\VacancyController as GuestVacancyController;
use App\Http\Controllers\Guest\ServicesController as GuestServicesController;
use App\Http\Controllers\Guest\ServicePayrollController as GuestPayrollController;
use App\Http\Controllers\Guest\ServiceContractingController as GuestContactingController;
use App\Http\Controllers\Guest\ServiceHumanResourceController as GuestHumanResourceController;
use App\Http\Controllers\Guest\ServiceVisaWorkPermitController as GuestVisaWorkPermitController;

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
Route::get('/career', [GuestCareerController::class, 'index'])->name('career');
Route::get('/contact', [GuestContactController::class, 'index'])->name('contact');
Route::get('/vacancies', [GuestVacancyController::class, 'index'])->name('vacancy');
Route::get('/services', [GuestServicesController::class, 'index'])->name('services');
route::get('/services-payroll-solutions',[GuestPayrollController::class, 'index'])->name('services.payroll');
route::get('/services-hr-solutions',[GuestHumanResourceController::class, 'index'])->name('services.hr');
route::get('/services-contracting',[GuestContactingController::class,'index'])->name('services.contracting');
route::get('/services-visas-workpermit',[GuestVisaWorkPermitController::class,'index'])->name('services.visa-work-permit');
Route::post('/contact/send', [GuestContactController::class, 'send'])->name('contact.send')->middleware('throttle:3,1');;

// Authenticated Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('home',HomeController::class);
    Route::resource('about', AboutController::class);
    Route::resource('career', CareerController::class);

    Route::resource('vacancy', VacancyController::class);
    Route::resource('vacancy-banner', VacancyBannerController::class);
    Route::resource('content', VacancyContentController::class);
    Route::resource('job', JobController::class);

    Route::controller(MessageController::class)->group(function () {
        Route::get('/messages', 'index')->name('messages.index');
        Route::get('/messages/fetch', 'fetchMessages')->name('messages.fetch');
        Route::get('/messages/trashed', 'trashed')->name('messages.trashed');
        Route::get('messages/{message}', 'show')->name('messages.show');
        Route::delete('/messages/{message}', 'destroy')->name('messages.destroy');
        Route::put('/messages/{id}/restore', 'restore')->name('messages.restore');
        Route::delete('/messages/{id}/force-delete', 'forceDelete')->name('messages.forceDelete');
    });


    Route::get('/admin-settings/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/admin-settings/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/admin-settings/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/admin-settings/roles/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::patch('/admin-settings/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/admin-settings/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::get('/admin-settings/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin-settings/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin-settings/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin-settings/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/admin-settings/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin-settings/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/admin-settings/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/admin-settings/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/admin-settings/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/admin-settings/permissions/edit/{permission}', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::patch('/admin-settings/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/admin-settings/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');


    Route::resource('contact-banner', ContactBannerController::class);

    // Custom route to update status
    Route::post('/job/update-status/{job}', [JobController::class, 'updateStatus'])->name('job.update-status');

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});


require __DIR__.'/auth.php';

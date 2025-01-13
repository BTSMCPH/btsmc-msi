<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Job;
use App\Policies\JobPolicy;
use App\Models\VacancyBanner;
use App\Policies\VacancyBannerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Job::class => JobPolicy::class,
        VacancyBanner::class => VacancyBannerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VacancyBanner;
use Illuminate\Auth\Access\Response;

class VacancyBannerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view vacancy banners');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, VacancyBanner $vacancyBanner): bool
    {
        return $user->hasPermissionTo('view vacancy banners');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create vacancy banners');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, VacancyBanner $vacancyBanner): bool
    {
        return $user->hasPermissionTo('update vacancy banners');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, VacancyBanner $vacancyBanner): bool
    {
        return $user->hasPermissionTo('delete vacancy banners');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, VacancyBanner $vacancyBanner): bool
    {
        return $user->hasPermissionTo('restore vacancy banners');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, VacancyBanner $vacancyBanner): bool
    {
        return $user->hasPermissionTo('force delete vacancy banners');
    }
}

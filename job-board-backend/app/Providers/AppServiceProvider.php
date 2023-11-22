<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Repositories
        $this->app->bind('App\Repositories\Interfaces\IUserRepository', 'App\Repositories\UserRepository');
        $this->app->bind('App\Repositories\Interfaces\IJobRepository', 'App\Repositories\JobRepository');
        $this->app->bind('App\Repositories\Interfaces\IProfileRepository', 'App\Repositories\ProfileRepository');
        $this->app->bind('App\Repositories\Interfaces\ICompanyRepository', 'App\Repositories\CompanyRepository');

        // Services
        $this->app->bind('App\Services\Interfaces\IUserService', 'App\Services\UserService');
        $this->app->bind('App\Services\Interfaces\IJobService', 'App\Services\JobService');
        $this->app->bind('App\Services\Interfaces\IProfileService', 'App\Services\ProfileService');
        $this->app->bind('App\Services\Interfaces\ICompanyService', 'App\Services\CompanyService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

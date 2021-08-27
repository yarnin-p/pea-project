<?php

namespace App\Providers;

use App\Models\PEADept;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Base\IBaseRepository;
use App\Repositories\PEADept\IPEADeptRepository;
use App\Repositories\PEADept\PEADeptRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(IPEADeptRepository::class, PEADeptRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

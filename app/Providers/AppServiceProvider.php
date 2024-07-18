<?php

namespace App\Providers;

use App\Models\Anak;
use App\Models\OrangTua;
use App\Models\Saudara;
use App\Observers\AnakObserver;
use App\Observers\OrangTuaObserver;
use App\Observers\SaudaraObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(150);
        Saudara::observe(SaudaraObserver::class);
        Anak::observe(AnakObserver::class);
        OrangTua::observe(OrangTuaObserver::class);
    }
}

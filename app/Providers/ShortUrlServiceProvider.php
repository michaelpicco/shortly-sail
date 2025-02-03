<?php

namespace App\Providers;

use App\Models\ShortUrls;
use App\Http\Services\ShortUrlService;
use Illuminate\Support\ServiceProvider;

class ShortUrlServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Setup the service
        $this->app->bind('App\Http\Services\ShortUrlService', function($app) { return new ShortUrlService(new ShortUrls()); });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

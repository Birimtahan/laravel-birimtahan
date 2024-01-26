<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->addFrontNamespace();
    }

    private function addFrontNamespace(): void
    {
        view()->addNamespace('front', resource_path('views/front'));
    }
}

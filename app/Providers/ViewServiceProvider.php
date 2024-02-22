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
        $this->addEmailNamespace();
    }

    private function addEmailNamespace(): void
    {
        view()->addNamespace('email', resource_path('views/email'));
    }
}

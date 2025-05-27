<?php

namespace Digitlimit\Flag;

use Digitlimit\Flag\Console\Commands\Generator;
use Exception;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Digitlimit\Flag\Component\Flag;

class FlagServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @throws Exception
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flag');

        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/flag'),
        ], 'flag-assets');

        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/flag'),
        ], 'flag-views');

        Blade::component('flag', Flag::class);
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->commands([
            Generator::class,
        ]);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return ['flag'];
    }
}

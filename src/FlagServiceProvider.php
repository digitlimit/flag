<?php

namespace Digitlimit\Flag;

use Digitlimit\Flag\Console\Commands\Generator;
use Exception;
use Illuminate\Support\ServiceProvider;

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

<?php

namespace Tarifiner\Providers;

use Illuminate\Support\ServiceProvider;
use Tarifiner\Console\Commands\ExampleCommand;
use Tarifiner\Console\Commands\MakePackage;

class TarifinerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->commands([
                ExampleCommand::class,
                
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'tarifiner');


        $migrations_path = __DIR__ . '/../copy/migrations';
        if (file_exists($migrations_path)) {
            $this->publishes([
                $migrations_path => database_path('migrations'),
            ], 'public');
        }

        $migrations_path = __DIR__ . '/../copy/Controllers';
        if (file_exists($migrations_path)) {
            $this->publishes([
                $migrations_path => app_path('Http/Controllers/Tarifiner'),
            ], 'public');
        }

        $migrations_path = __DIR__ . '/../copy/views';
        if (file_exists($migrations_path)) {
            $this->publishes([
                $migrations_path => resource_path('views/tarifiner'),
            ], 'public');
        }


        $js_path = __DIR__ . '/../copy/js';
        if (file_exists($js_path)) {
            $this->publishes([
                $js_path => public_path('js/tarifiner'),
            ], 'public');
        }

        /*
        $this->publishes([
            __DIR__ . '/../copy/Controllers/Tarifiner' => app_path('Http/Controllers'),
        ], 'public');
*/

    }
}

<?php

namespace Modules\Projects\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class ProjectsServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Projects', 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Projects', 'Config/config.php') => config_path('projects.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Projects', 'Config/config.php'), 'projects'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/projects');

        $sourcePath = module_path('Projects', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/projects';
        }, \Config::get('view.paths')), [$sourcePath]), 'projects');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/projects');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'projects');
        } else {
            $this->loadTranslationsFrom(module_path('Projects', 'Resources/lang'), 'projects');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Projects', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}

<?php

namespace BakerySoft\LaravelBakerySoft;

use Illuminate\Support\ServiceProvider;

class LaravelBakerySoftServiceProvider extends ServiceProvider
{
  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot()
  {
    $this->bootForConsole();
    $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    $this->loadViewsFrom(__DIR__ . '/./../resources/views', 'bakery-soft');
  }

  /**
   * Register any package services.
   *
   * @return void
   */
  public function register()
  {
    $this->mergeConfigFrom(__DIR__ . '/../config/packages.php', 'packages');
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return ['packages'];
  }

  /**
   * Console-specific booting.
   *
   * @return void
   */
  protected function bootForConsole()
  {
    $this->publishes([
      __DIR__ . '/../config/packages.php' => config_path('packages.php'),
    ], 'packages.config');

    $this->publishes([
      __DIR__ . '/stubs/' => base_path('resources/bakery-soft/stubs/'),
    ]);


    $this->publishes([
      __DIR__ . '/../assets/app-assets'     => base_path('public/app-assets/*'),
      __DIR__ . '/../assets/assets-dashboard' => base_path('public/assets-dashboard/*'),
      __DIR__ . '/../resources/template' => base_path('resources/views/vendor/bakery-soft/template/config.blade.php'),
      __DIR__ . '/../resources/template' => base_path('resources/views/vendor/bakery-soft/template/index.blade.php'),
      __DIR__ . '/../resources/template' => base_path('resources/views/vendor/bakery-soft/template/create.blade.php'),
      __DIR__ . '/../resources/template' => base_path('resources/views/vendor/bakery-soft/template/edit.blade.php'),
      __DIR__ . '/../resources/template' => base_path('resources/views/vendor/bakery-soft/template/script-file.blade.php'),
      __DIR__ . '/../resources/template' => base_path('resources/views/vendor/bakery-soft/bakery-soft-dashboard.blade.php'),
      __DIR__ . '/../resources/template' => base_path('resources/views/vendor/bakery-soft/generate-crud.blade.php'),
      __DIR__ . '/../resources/template' => base_path('resources/views/vendor/bakery-soft/packages.blade.php'),
    ]);
  }
}

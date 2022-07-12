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

    // $this->publishes([
    //   __DIR__ . '/stubs/' => base_path('resources/bakery-soft/stubs/'),
    // ]);


    $this->publishes([
      __DIR__ . '/../assets/app-assets'     => base_path('public/app-assets/*'),
      __DIR__ . '/../assets/assets-dashboard' => base_path('public/assets-dashboard/*'),

      __DIR__ . '/../assets/css/dashboard.css' => public_path('vendor/bakerysoft/css/dashboard.css'),
      __DIR__ . '/../assets/images/logo.jpg' => public_path('vendor/bakerysoft/images/logo.jpg'),

      __DIR__ . '/../resources/views/template/' => base_path('resources/views/vendor/bakerysoft/template/config.blade.php'),
      __DIR__ . '/../resources/views/template/' => base_path('resources/views/vendor/bakerysoft/template/index.blade.php'),
      __DIR__ . '/../resources/views/template/' => base_path('resources/views/vendor/bakerysoft/template/create.blade.php'),
      __DIR__ . '/../resources/views/template/' => base_path('resources/views/vendor/bakerysoft/template/edit.blade.php'),
      __DIR__ . '/../resources/views/template/' => base_path('resources/views/vendor/bakerysoft/template/script-file.blade.php'),

      __DIR__ . '/../resources/views/bakerysoft-dashboard.blade.php' => base_path('resources/views/vendor/bakerysoft/bakerysoft-dashboard.blade.php'),
      __DIR__ . '/../resources/views/generate-crud.blade.php'         => base_path('resources/views/vendor/bakerysoft/generate-crud.blade.php'),
      __DIR__ . '/../resources/views/packages.blade.php'              => base_path('resources/views/vendor/bakerysoft/packages.blade.php'),
    ]);
  }
}

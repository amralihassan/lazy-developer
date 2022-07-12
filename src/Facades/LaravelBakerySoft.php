<?php

namespace BakerySoft\LaravelBakerySoft\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelBakerySoft extends Facade
{
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor()
  {
    return 'laravelbakerysoft';
  }
}

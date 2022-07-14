<?php

use Illuminate\Support\Str;

if (function_exists('basePath')) {
  function basePath($path = '')
  {
    return app()->basePath($path);
  }
}

if (!function_exists('userAuth')) {
  function userAuth()
  {
    return auth()->guard('web');
  }
}

if (!function_exists('authInfo')) {
  function authInfo()
  {
    if (userAuth()->check()) {
      $id = userAuth()->user()->id;

      return \App\Models\User::where('id', $id)->first();
    }
  }
}

if (!function_exists('str_plural')) {
  function str_plural($value, $count = 2)
  {
    return Str::plural($value, $count);
  }
}

if (!function_exists('str_singular')) {
  function str_singular($value)
  {
    return Str::singular($value);
  }
}

if (!function_exists('permission')) {
  function permission($permission)
  {
    return true;
    return authInfo()->isAbleTo($permission);
  }
}

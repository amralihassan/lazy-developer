<?php

namespace BakerySoft\LaravelBakerySoft\Http\Classes;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class BSRouteProcess extends BSControllerProcess
{
    public $modelNamespace;
    public $routeName;
    public $routeGroupPrefix;
    public $routeGroupNamespace;


    function __construct($data)
    {
        parent::__construct($data);
        $this->routeGroupPrefix =  $data['routeGroupPrefix'];
        $this->routeGroupNamespace =  $data['routeGroupNamespace'];
        $this->routeName =  $this->str_plural($data['modelName']);
    }

    public function createRoutes()
    {
        $webRoute = $this->base_path('routes/web.php');
        if (!empty($this->routeGroupPrefix) || !empty($this->routeGroupNamespace)) {
            $this->group($webRoute);
        } else {
            File::append($webRoute, "\n" . '// ' . ucfirst($this->routeName));
            File::append($webRoute, "\n" . implode("\n", $this->addResourceRoute()));
            File::append($webRoute, "\n" . implode("\n", $this->addDeleteRoute()));
            File::append($webRoute, "\n" . implode("\n", $this->addImportRoute()));
            File::append($webRoute, "\n" . implode("\n", $this->addExportRoute()));
        }


        // clear route cache
        Artisan::call('route:cache');
    }

    private function group($webRoute)
    {
        $prefix = !empty($this->routeGroupPrefix) ? '"prefix" => "' . $this->routeGroupPrefix . '",' : '';
        $namespace = !empty($this->routeGroupNamespace) ? '"namespace" => "' . $this->routeGroupNamespace . '"' : '';
        $routes  = "\n" . "\t" . '// ' . ucfirst($this->routeName);
        $routes .= "\n" . "\t" . implode("\n", $this->addResourceRoute());
        $routes .= "\n" . "\t" . implode("\n", $this->addDeleteRoute());
        $routes .= "\n" . "\t" . implode("\n", $this->addImportRoute());
        $routes .= "\n" . "\t" . implode("\n", $this->addExportRoute());

        $group = 'Route::group([' . $prefix  . $namespace . '], function () {' . $routes . "\n" . '});';
        File::append($webRoute, "\n" . $group);
    }

    private function addResourceRoute()
    {

        return ["Route::resource('" . $this->routeName . "', " . $this->controllerNamespace . '\\' . $this->controllerName . "::class)->except('destroy', 'show');"];
    }

    private function addDeleteRoute()
    {
        return ["Route::delete('/" . $this->routeName . "/destroy', [" . $this->controllerNamespace . '\\' . $this->controllerName . "::class, 'destroy'])->name('" . $this->routeName . ".destroy');"];
    }

    private function addImportRoute()
    {
        return ["Route::post('/" . $this->routeName . "/import', [" . $this->controllerNamespace . '\\' . $this->controllerName . "::class, 'import'])->name('" . $this->routeName . ".import');"];
    }

    private function addExportRoute()
    {
        return ["Route::get('/" . $this->routeName . "/export', [" . $this->controllerNamespace . '\\' . $this->controllerName . "::class, 'export'])->name('" . $this->routeName . ".export');"];
    }

    private function base_path($path = '')
    {
        return app()->basePath($path);
    }

    private function str_plural($value, $count = 2)
    {
        return Str::plural($value, $count);
    }
}
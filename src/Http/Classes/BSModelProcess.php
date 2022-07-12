<?php

namespace BakerySoft\LaravelBakerySoft\Http\Classes;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class BSModelProcess
{
    public $modelNamespace;
    public $namespace;
    public $app = 'App\\';
    public $modelStub;
    public $migrationStub;

    function __construct($data)
    {
        $this->modelNamespace = !empty($data['modelNamespace']) ? '\\' . ucfirst($data['modelNamespace']) : ucfirst($data['modelNamespace']);
        $this->modelName =  ucfirst($data['modelName']);
        $this->loadModelStub();
    }

    public function replaceNamespace()
    {
        $this->modelStub = str_replace(
            '{{ namespace }}',
            'App\Models' .  $this->modelNamespace,
            $this->modelStub
        );

        return $this;
    }

    public function replaceClass()
    {
        $this->modelStub = str_replace(
            '{{ class }}',
            $this->modelName,
            $this->modelStub
        );

        return $this;
    }

    public function generateModel()
    {
        $this->namespace = str_replace('\\', '', $this->modelNamespace);

        Artisan::call('make:model', [
            'name' => $this->namespace . '/' . ucfirst($this->modelName)
        ]);
    }

    private function loadModelStub()
    {
        // load stubs content
        $this->modelStub = $this->getModelStubContent();
    }

    private function getModelStubContent()
    {
        // save the content into variable
        return File::get($this->base_path('vendor/bakerysoft/laravelbakerysoft/src/stubs/BSModel.stub'));
    }

    private function base_path($path = '')
    {
        return app()->basePath($path);
    }
}

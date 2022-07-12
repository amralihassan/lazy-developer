<?php

namespace BakerySoft\LaravelBakerySoft\Http\Classes;

use function PHPUnit\Framework\fileExists;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class BSRequestProcess
{

    public $app = 'App\\';
    public $requestStub;
    public $modelName;
    public $class;
    public $requestNamespace;

    function __construct($data)
    {
        $this->modelName =  ucfirst($data['modelName']);
        $this->class =  ucfirst($data['modelName']) . 'Request';

        $this->loadRequestStub();
    }

    public function replaceNamespace()
    {
        $this->requestStub = str_replace(
            '{{ namespace }}',
            'App\Http\Requests',
            $this->requestStub
        );

        return $this;
    }

    public function replaceClass()
    {
        $this->requestStub = str_replace(
            '{{ class }}',
            $this->class,
            $this->requestStub
        );

        return $this;
    }

    public function generateRequest()
    {
        Artisan::call('make:request', [
            'name' => ucfirst($this->class)
        ]);
    }

    private function loadRequestStub()
    {
        // load stubs content
        $this->requestStub = $this->getRequestStubContent();
    }

    private function getRequestStubContent()
    {
        // save the content into variable
        return File::get($this->base_path('BackerySoft/BSRequest.stub'));
    }

    private function base_path($path = '')
    {
        return app()->basePath($path);
    }
}

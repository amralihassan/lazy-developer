<?php

namespace BakerySoft\LaravelBakerySoft\Http\Classes;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Artisan;

class BSControllerProcess
{
    public $defaultControllerPath = 'App\Http\Controllers';
    public $defaultModelPath = 'App\Models';
    public $defaultRequestPath = 'App\Http\Requests';
    public $defaultExportPath = 'App\Exports';
    public $defaultImportPath = 'App\Imports';
    public $modelName;
    public $controllerStub;
    public $controllerNamespace;
    public $modelNamespace;
    public $controllerName;
    public $viewPath;
    public $columnsTitles;



    public function __construct($data)
    {
        $this->modelName = ucfirst($data['modelName']);
        $this->setControllerName($data['modelName']);

        $this->columnsTitles = $data['field_name'];

        // auto generate controller
        $this->generateController($data['controllerNamespace']);

        // segment
        $this->setControllerNamespace($data['controllerNamespace']);
        $this->setModelNamespace($data['modelNamespace']);

        $this->viewPath = $data['viewPath'];

        // load controller stub
        $this->loadStubs();
    }

    public function replaceColumnsTitles()
    {
        $this->controllerStub = str_replace(
            '{{ columnsTitles }}',
            $this->columnsTitles(),
            $this->controllerStub
        );
        return $this;
    }

    private function columnsTitles()
    {
        $rows = '<th style="width:40px">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" id="checkbox0">
                        <span class="custom-control-label"></span>
                    </label>
                </th>
                <th>#</th>' . "\n";
        for ($i = 0; $i < count($this->columnsTitles); $i++) {
            $rows .=  "\t" . "\t" . "\t" . "\t" . '<th>' . $this->prepareColumnName($i) . '</th>' . "\n";
        }
        $rows .=  "\t" . "\t" . "\t" . "\t" .  '<th>Action</th>';
        return $rows;
    }

    private function prepareColumnName($i)
    {
        $columnName =  str_replace('_id', '', $this->columnsTitles[$i]);
        $columnName = str_replace('_', ' ', $columnName);
        return $columnName;
    }

    public function replaceExportModelFilename()
    {
        $this->controllerStub = str_replace(
            '{{ exportModelFilename }}',
            $this->str_plural(strtolower($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceModelClassExport()
    {
        $this->controllerStub = str_replace(
            '{{ modelClassExport }}',
            $this->str_plural(ucfirst($this->modelName)) . 'Export',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceModelClassImport()
    {
        $this->controllerStub = str_replace(
            '{{ modelClassImport }}',
            $this->str_plural(ucfirst($this->modelName)) . 'Import',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceRouteUpdate()
    {
        $this->controllerStub = str_replace(
            '{{ routeUpdate }}',
            $this->str_plural(strtolower($this->modelName)) . '.update',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceEditPageTitle()
    {
        $this->controllerStub = str_replace(
            '{{ editPageTitle }}',
            'Edit ' . $this->str_singular(ucfirst($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceModelRequest()
    {
        $this->controllerStub = str_replace(
            '{{ modelRequest }}',
            ucfirst($this->modelName) . 'Request',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceEditView()
    {
        $this->controllerStub = str_replace(
            '{{ editView }}',
            'vendor.bakerysoft.template.edit',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceCreateView()
    {
        $this->controllerStub = str_replace(
            '{{ createView }}',
            'vendor.bakerysoft.template.create',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceFormPath()
    {
        $this->controllerStub = str_replace(
            '{{ formPath }}',
            $this->viewPath . '.form',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceRouteStore()
    {
        $this->controllerStub = str_replace(
            '{{ routeStore }}',
            $this->str_plural(strtolower($this->modelName)) . '.store',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceMainTitle()
    {
        $this->controllerStub = str_replace(
            '{{ mainTitle }}',
            $this->str_plural(ucfirst($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceCreatePageTitle()
    {
        $this->controllerStub = str_replace(
            '{{ createPageTitle }}',
            'Create ' . $this->str_singular(ucfirst($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceObjectClassName()
    {
        $this->controllerStub = str_replace(
            '{{ objectClassName }}',
            $this->str_singular(strtolower($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceScriptPathFile()
    {
        $this->controllerStub = str_replace(
            '{{ scriptPathFile }}',
            $this->viewPath . '.script',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceRouteIndex()
    {
        $this->controllerStub = str_replace(
            '{{ routeIndex }}',
            $this->str_plural(strtolower($this->modelName)) . '.index',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceRouteCreate()
    {
        $this->controllerStub = str_replace(
            '{{ routeCreate }}',
            $this->str_plural(strtolower($this->modelName)) . '.create',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceRouteEdit()
    {
        $this->controllerStub = str_replace(
            '{{ routeEdit }}',
            $this->str_plural(strtolower($this->modelName)) . '.edit',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceRouteDestroy()
    {
        $this->controllerStub = str_replace(
            '{{ routeDestroy }}',
            $this->str_plural(strtolower($this->modelName)) . '.destroy',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceRouteImport()
    {
        $this->controllerStub = str_replace(
            '{{ routeImport }}',
            $this->str_plural(strtolower($this->modelName)) . '.import',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceRouteExport()
    {
        $this->controllerStub = str_replace(
            '{{ routeExport }}',
            $this->str_plural(strtolower($this->modelName)) . '.export',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceCreateButtonName()
    {
        $this->controllerStub = str_replace(
            '{{ createButtonName }}',
            'Create ' . $this->str_singular(ucfirst($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceDeleteButtonName()
    {
        $this->controllerStub = str_replace(
            '{{ deleteButtonName }}',
            'Delete',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceImportButtonName()
    {
        $this->controllerStub = str_replace(
            '{{ importButtonName }}',
            'Import',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceExportButtonName()
    {
        $this->controllerStub = str_replace(
            '{{ exportButtonName }}',
            'Export',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceIndexPageTitle()
    {
        $this->controllerStub = str_replace(
            '{{ indexPageTitle }}',
            $this->str_plural(ucfirst($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceIndexView()
    {
        $this->controllerStub = str_replace(
            '{{ indexView }}',
            'vendor.bakerysoft.template.index',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceModelName()
    {
        $this->controllerStub = str_replace(
            '{{ modelName }}',
            $this->modelName,
            $this->controllerStub
        );
        return $this;
    }

    public function replaceViewPermission()
    {
        $this->controllerStub = str_replace(
            '{{ viewPermission }}',
            'view-' . $this->str_plural(strtolower($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceAddPermission()
    {
        $this->controllerStub = str_replace(
            '{{ addPermission }}',
            'add-' . $this->str_plural(strtolower($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceEditPermission()
    {
        $this->controllerStub = str_replace(
            '{{ editPermission }}',
            'edit-' . $this->str_plural(strtolower($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceDeletePermission()
    {
        $this->controllerStub = str_replace(
            '{{ deletePermission }}',
            'delete-' . $this->str_plural(strtolower($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceImportPermission()
    {
        $this->controllerStub = str_replace(
            '{{ importPermission }}',
            'import-' . $this->str_plural(strtolower($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceExportPermission()
    {
        $this->controllerStub = str_replace(
            '{{ exportPermission }}',
            'export-' . $this->str_plural(strtolower($this->modelName)),
            $this->controllerStub
        );
        return $this;
    }

    public function replaceClass()
    {
        $this->controllerStub = str_replace(
            '{{ class }}',
            $this->controllerName,
            $this->controllerStub
        );
        return $this;
    }

    public function replaceUseImportClassNamespace()
    {
        $this->controllerStub = str_replace(
            '{{ useImportClassNamespace }}',
            $this->defaultImportPath . '\\' . $this->str_plural($this->modelName) . 'Import',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceUseExportClassNamespace()
    {
        $this->controllerStub = str_replace(
            '{{ useExportClassNamespace }}',
            $this->defaultExportPath . '\\' . $this->str_plural($this->modelName) . 'Export',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceUseRequestClassNamespace()
    {
        $this->controllerStub = str_replace(
            '{{ useRequestClassNamespace }}',
            $this->defaultRequestPath . '\\' . $this->modelName . 'Request',
            $this->controllerStub
        );
        return $this;
    }

    public function replaceNamespace()
    {
        $this->controllerStub = str_replace(
            '{{ namespace }}',
            $this->controllerNamespace,
            $this->controllerStub
        );
        return $this;
    }

    public function replaceUseModelNamespace()
    {
        $this->controllerStub = str_replace(
            '{{ useModelNamespace }}',
            $this->modelNamespace,
            $this->controllerStub
        );
        return $this;
    }

    public function setControllerNamespace($controllerNamespace)
    {
        $this->controllerNamespace = !empty($controllerNamespace) ? $this->defaultControllerPath . '\\' . ucfirst($controllerNamespace) :
            $this->defaultControllerPath;
    }

    public function setModelNamespace($modelNamespace)
    {
        $this->modelNamespace = !empty($modelNamespace) ? $this->defaultModelPath .  '\\' . ucfirst($modelNamespace) . '\\' . $this->modelName :
            $this->defaultModelPath . '\\' . $this->modelName;
    }

    private function loadStubs()
    {
        // load stubs content
        $this->controllerStub = $this->getControllerStubContent();
    }

    private function getControllerStubContent()
    {
        // save the content into variable
        return File::get($this->base_path('vendor/bakerysoft/laravelbakerysoft/src/stubs/BSController.stub'));
    }

    private function generateController($controllerNamespace)
    {
        $path = !empty($controllerNamespace) ? ucfirst($controllerNamespace) . '/' . $this->controllerName : $this->controllerName;

        Artisan::call('make:controller', ['name' => $path]);
    }

    private function setControllerName($modelName)
    {
        $this->controllerName = ucfirst($modelName) . 'Controller';
    }

    private function base_path($path = '')
    {
        return app()->basePath($path);
    }

    private function str_plural($value, $count = 2)
    {
        return Str::plural($value, $count);
    }

    private function str_singular($value)
    {
        return Str::singular($value);
    }
}

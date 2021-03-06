<?php

namespace BakerySoft\LaravelBakerySoft\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use BakerySoft\LaravelBakerySoft\Http\Classes\BSModelProcess;
use BakerySoft\LaravelBakerySoft\Http\Classes\BSRouteProcess;
use BakerySoft\LaravelBakerySoft\Http\Classes\BSRequestProcess;
use BakerySoft\LaravelBakerySoft\Http\Classes\BSMigrationProcess;
use BakerySoft\LaravelBakerySoft\Http\Classes\BSControllerProcess;
use Illuminate\Support\Facades\Artisan;

class BakerySoftController extends Controller
{
    public $bsControllerProcess;
    public $bsModelProcess;
    public $bsRequestProcess;
    public $bsRouteProcess;
    public $bsMigrationProcess;
    public $controllerNamespace;
    public $viewPath;
    public $runMigration;
    public $composerRequire = 'composer require ';


    public function __construct()
    {
        $data['controllerNamespace'] = request('controller_namespace');
        $data['modelNamespace'] = request('model_namespace');
        $data['modelName'] = request('model_name');
        $data['viewPath'] = request('view_path');
        $data['routeGroupPrefix'] = request('route_group_prefix');
        $data['routeApi'] = request('route_api');
        $data['routePath'] = request('route_path');
        $data['runMigration'] = request('run_migration');
        $data['defaultMigration'] = request('default_migration');
        $data['field_name'] = request('field_name');
        $data['datatype'] = request('datatype');
        $data['nullable'] = request('nullable');
        $data['default_value'] = request('default_value');
        $data['enum_value'] = request('enum_value');

        $this->controllerNamespace = ucfirst(request('controller_namespace'));
        $this->viewPath = request('view_path');
        $this->runMigration = request('run_migration');

        // classes
        $this->bsControllerProcess = new BSControllerProcess($data);
        $this->bsModelProcess = new BSModelProcess($data);
        $this->bsRequestProcess = new BSRequestProcess($data);
        $this->bsRouteProcess = new BSRouteProcess($data);
        $this->bsMigrationProcess = new BSMigrationProcess($data);
    }

    public function index()
    {
        return view('bakerysoft::bakerysoft-dashboard');
    }

    public function packages()
    {
        $laratrust['installed'] = !empty(shell_exec('cd .. && composer show ' . config('packages.laratrust_name'))) ? true : false;
        $laratrust['package'] = $this->composerRequire . config('packages.laratrust');

        $ui['installed'] = !empty(shell_exec('cd .. && composer show ' . config('packages.ui_name'))) ? true : false;
        $ui['package'] = $this->composerRequire . config('packages.ui') . ' && ' . config('packages.auth');

        $excel['installed'] = !empty(shell_exec('cd .. && composer show ' . config('packages.excel_name'))) ? true : false;
        $excel['package'] = $this->composerRequire . config('packages.excel');

        $image['installed'] = !empty(shell_exec('cd .. && composer show ' . config('packages.image_name'))) ? true : false;
        $image['package'] = $this->composerRequire . config('packages.image');

        $realrashid['installed'] = !empty(shell_exec('cd .. && composer show ' . config('packages.realrashid_name'))) ? true : false;
        $realrashid['package'] = $this->composerRequire . config('packages.realrashid');

        $yajra['installed'] = !empty(shell_exec('cd .. && composer show ' . config('packages.yajra_name'))) ? true : false;
        $yajra['package'] = $this->composerRequire . config('packages.yajra');

        return view('bakerysoft::packages', compact('laratrust', 'excel', 'image', 'realrashid', 'yajra', 'ui'));
    }

    public function installUi()
    {
        shell_exec('cd .. && ' . $this->composerRequire . config('packages.ui'));
        shell_exec('cd .. && ' .  config('packages.auth'));

        // add dashboard Controller
        $this->createDashboardController();

        // add auth routes
        $this->appendAuthRoutes();

        // add dashboard routes
        $this->appendDashboardRoutes();

        // clear route cache
        Artisan::call('route:cache');

        return redirect()->back()->with('success', 'Saved Successfully');
    }

    private function createDashboardController()
    {
        $dashboard_controller_path = $this->base_path('app/Http/Controllers/DashboardController.php');
        touch($dashboard_controller_path);
        File::put($dashboard_controller_path, $this->dashboardControllerContent());
    }

    private function appendAuthRoutes()
    {
        $auth_path = $this->base_path('routes/auth.php');
        touch($auth_path);
        // // add auth routes
        File::put($auth_path, $this->authRoutes());
        // // include auth file in web route
        File::append($this->base_path('routes/web.php'), "\n" . "require __DIR__ . '/auth.php';" . "\n");
    }

    private function appendDashboardRoutes()
    {
        // create new file route for dashboard
        $dashboard_path = $this->base_path('routes/app-routes.php');
        touch($dashboard_path);

        // prepare dashboard routes file
        File::put($dashboard_path, "<?php");
        File::append($dashboard_path, "\n" . "use Illuminate\Support\Facades\Route;" . "\n");

        File::append($this->base_path('routes/web.php', $this->authRoutes()), $this->dashboardRoutes());
    }

    private function dashboardControllerContent()
    {
        return File::get($this->base_path('vendor/bakerysoft/laravelbakerysoft/src/stubs/DashboardController.stub'));
    }

    private function dashboardRoutes()
    {
        return File::get($this->base_path('vendor/bakerysoft/laravelbakerysoft/src/stubs/dashboard-routes.stub'));
    }

    private function authRoutes()
    {
        return File::get($this->base_path('vendor/bakerysoft/laravelbakerysoft/src/stubs/auth.stub'));
    }

    public function installExcel()
    {
        shell_exec('cd .. && ' . $this->composerRequire . config('packages.excel'));
        return redirect()->back()->with('success', 'Saved Successfully');
    }

    public function installImage()
    {
        shell_exec('cd .. && ' . $this->composerRequire . config('packages.image'));
        return redirect()->back()->with('success', 'Saved Successfully');
    }

    public function installRealrashid()
    {
        shell_exec('cd .. && ' . $this->composerRequire . config('packages.realrashid'));
        return redirect()->back()->with('success', 'Saved Successfully');
    }

    public function installYajra()
    {
        shell_exec('cd .. && ' . $this->composerRequire . config('packages.yajra'));
        return redirect()->back()->with('success', 'Saved Successfully');
    }

    public function installLaratrust()
    {
        shell_exec('cd .. && ' . $this->composerRequire . config('packages.laratrust'));
        return redirect()->back()->with('success', 'Saved Successfully');
    }

    public function loadCrud()
    {
        return view('bakerysoft::generate-crud');
    }

    public function generate()
    {
        // publish controller
        $this->publishController();

        // publish model
        $this->publishModel();

        // publish request
        $this->publishRequest();

        // publish view
        $this->publishView();

        // publish route
        $this->publishRoute();

        // create migration fields
        $this->createFields();

        // add to sidebar
        $this->addToSidebar();

        return redirect()->back();
    }

    private function addToSidebar()
    {
        $this->bsControllerProcess->addToSidebar();
    }

    private function publishController()
    {
        // replacement
        $this->bsControllerProcess
            ->replaceNamespace()
            ->replaceUseModelNamespace()
            ->replaceUseRequestClassNamespace()
            ->replaceUseExportClassNamespace()
            ->replaceUseImportClassNamespace()
            ->replaceClass()
            ->replaceViewPermission()
            ->replaceAddPermission()
            ->replaceEditPermission()
            ->replaceDeletePermission()
            ->replaceImportPermission()
            ->replaceExportPermission()
            ->replaceModelName()
            ->replaceIndexView()
            ->replaceIndexPageTitle()
            ->replaceCreateButtonName()
            ->replaceDeleteButtonName()
            ->replaceImportButtonName()
            ->replaceExportButtonName()
            ->replaceRouteIndex()
            ->replaceRouteCreate()
            ->replaceRouteEdit()
            ->replaceRouteDestroy()
            ->replaceRouteImport()
            ->replaceRouteExport()
            ->replaceScriptPathFile()
            ->replaceObjectClassName()
            ->replaceCreatePageTitle()
            ->replaceMainTitle()
            ->replaceRouteStore()
            ->replaceFormPath()
            ->replaceEditView()
            ->replaceCreateView()
            ->replaceModelRequest()
            ->replaceEditPageTitle()
            ->replaceRouteUpdate()
            ->replaceModelClassExport()
            ->replaceModelClassImport()
            ->replaceExportModelFilename()
            ->replaceColumnsTitles()
            ->replaceDataTableColumns();

        // insert backer soft controller content to new controller
        File::put($this->getOldController(), $this->bsControllerProcess->controllerStub);
    }

    private function getOldController()
    {
        return $this->base_path('app/Http/Controllers/' . $this->controllerNamespace . '/' . $this->bsControllerProcess->controllerName . '.php');
    }

    private function publishModel()
    {
        // generate model
        $this->bsModelProcess->generateModel();

        $this->bsModelProcess->replaceNamespace()->replaceClass();

        // current model before replacement
        $modelPath = $this->base_path('app/Models/' . $this->bsModelProcess->namespace . '/' . $this->bsModelProcess->modelName . '.php');

        // insert backer soft model content to new model
        File::put($modelPath, $this->bsModelProcess->modelStub);
    }

    private function publishRoute()
    {
        $this->bsRouteProcess->createRoutes();
    }

    private function publishRequest()
    {
        // generate request
        $this->bsRequestProcess->generateRequest();

        $this->bsRequestProcess->replaceNamespace()->replaceClass();

        // current request before replacement
        $requestPath = $this->base_path('app/Http/Requests/'  . $this->bsRequestProcess->class . '.php');

        // insert backer soft model content to new model
        File::put($requestPath, $this->bsRequestProcess->requestStub);
    }

    private function createFields()
    {
        $this->bsMigrationProcess->replaceClass()->replaceTable()->replaceFields();
        $path = $this->bsMigrationProcess->createMigrationFile();
        File::put($path, $this->bsMigrationProcess->migrationCreateStub);
        if ($this->runMigration) {
            $this->bsMigrationProcess->migrate();
        }
    }

    private function base_path($path = '')
    {
        return app()->basePath($path);
    }

    private function publishView()
    {
        if (!is_dir($this->base_path('resources/views/' . $this->viewPath))) {
            mkdir($this->base_path('resources/views/' . $this->viewPath));
        }
        // form
        touch($this->base_path('resources/views/' . $this->viewPath) . '/form.blade.php');
        // script
        touch($this->base_path('resources/views/' . $this->viewPath) . '/script.blade.php');
    }
}

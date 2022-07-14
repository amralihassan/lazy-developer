<?php

use BakerySoft\LaravelBakerySoft\Http\Controllers\BakerySoftController;

Route::get('bakerysoft', [BakerySoftController::class, 'index']);
Route::get('bakerysoft/install/packages', [BakerySoftController::class, 'packages'])->name('packages');
Route::get('bakerysoft/generate-crud', [BakerySoftController::class, 'loadCrud'])->name('load.crud');
Route::post('bakerysoft/generate', [BakerySoftController::class, 'generate'])->name('generate')->name('packages');
Route::post('bakerysoft/install/laravel/ui', [BakerySoftController::class, 'installUi'])->name('install-ui');
Route::post('bakerysoft/install/excel', [BakerySoftController::class, 'installExcel'])->name('install-excel');
Route::post('bakerysoft/install/image', [BakerySoftController::class, 'installImage'])->name('install-image');
Route::post('bakerysoft/install/realrashid', [BakerySoftController::class, 'installRealrashid'])->name('install-realrashid');
Route::post('bakerysoft/install/yajra', [BakerySoftController::class, 'installYajra'])->name('install-yajra');
Route::post('bakerysoft/install/laratrust', [BakerySoftController::class, 'installLaratrust'])->name('install-laratrust');

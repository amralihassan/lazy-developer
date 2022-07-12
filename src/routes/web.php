<?php

use BakerySoft\LaravelBakerySoft\Http\Controllers\BakerySoftController;

Route::get('bakery-soft', [BakerySoftController::class, 'index']);
Route::get('bakery-soft/install/packages', [BakerySoftController::class, 'packages']);
Route::get('bakery-soft/generate-crud', [BakerySoftController::class, 'loadCrud']);
Route::post('bakery-soft/generate', [BakerySoftController::class, 'generate'])->name('generate');
Route::post('bakery-soft/install/laravel/ui', [BakerySoftController::class, 'installUi'])->name('install-ui');
Route::post('bakery-soft/install/excel', [BakerySoftController::class, 'installExcel'])->name('install-excel');
Route::post('bakery-soft/install/image', [BakerySoftController::class, 'installImage'])->name('install-image');
Route::post('bakery-soft/install/realrashid', [BakerySoftController::class, 'installRealrashid'])->name('install-realrashid');
Route::post('bakery-soft/install/yajra', [BakerySoftController::class, 'installYajra'])->name('install-yajra');
Route::post('bakery-soft/install/laratrust', [BakerySoftController::class, 'installLaratrust'])->name('install-laratrust');

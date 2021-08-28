<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PEADept\PEADeptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->name('api.')->group(function () {
    Route::name('auth.')->prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });

    Route::name('pea-departments.')->prefix('pea-departments')->group(function () {
        Route::get('all', [PEADeptController::class, 'all'])->name('list-all-pea-dept');

        Route::name('first.')->prefix('first')->group(function () {

            Route::apiResource('', 'PEADept\PEADeptController')
                ->parameters(['' => 'pea-dept-id']);

//            Route::post('', [PEADeptController::class, 'show'])->name('store');
//            Route::get('', [PEADeptController::class, 'index'])->name('all');
//            Route::get('{pea-dept-id}', [PEADeptController::class, 'show'])->name('show');
//            Route::put('{pea-dept-id}', [PEADeptController::class, 'show'])->name('update');
//            Route::delete('{pea-dept-id}', [PEADeptController::class, 'show'])->name('delete');

        });
    });
});

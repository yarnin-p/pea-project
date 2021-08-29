<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PEADept\PEADeptController;
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

    Route::middleware(['auth:api'])->group(function () {
        Route::name('pea-departments.')
            ->prefix('pea-departments')
            ->group(function () {
                Route::get('all', [PEADeptController::class, 'all'])->name('list-all-pea-dept');

                Route::name('first.')->prefix('first')->group(function () {
                    Route::apiResource('', 'PEADept\PEADeptController')
                        ->parameters(['' => 'id']);
                });

                Route::name('second.')->prefix('second')->group(function () {
                    Route::apiResource('', 'PEADept\PEASecondDeptController')
                        ->parameters(['' => 'id']);
                });

                Route::name('third.')->prefix('third')->group(function () {
                    Route::apiResource('', 'PEADept\PEAThirdDeptController')
                        ->parameters(['' => 'id']);
                });
            });

        Route::name('department-dimensions.')
            ->prefix('department-dimensions')
            ->group(function () {
                Route::apiResource('', 'PEADeptDimension\PEADeptDimensionController')
                    ->parameters(['' => 'id']);

                Route::name('files.')->prefix('files')->group(function () {
                    Route::apiResource('', 'PEADeptDimension\PEADeptDimensionFileController')
                        ->parameters(['' => 'id']);
                });
            });
    });
});

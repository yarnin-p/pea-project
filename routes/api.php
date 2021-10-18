<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PEADept\PEAFirstDeptController;
use App\Http\Controllers\PEADeptDimension\DimensionController;
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

    Route::middleware(['cors'])->group(function () {
        Route::name('pea-departments.')
            ->prefix('pea-departments')
            ->group(function () {
                Route::get('all', [PEAFirstDeptController::class, 'all'])->name('list-all-pea-dept');

                Route::name('first.')->prefix('first')->group(function () {
                    Route::apiResource('', 'PEADept\PEAFirstDeptController')
                        ->parameters(['' => 'PEAFirstDept']);
                });

                Route::name('second.')->prefix('second')->group(function () {
                    Route::apiResource('', 'PEADept\PEASecondDeptController')
                        ->parameters(['' => 'PEASecondDept']);
                });

                Route::name('third.')->prefix('third')->group(function () {
                    Route::apiResource('', 'PEADept\PEAThirdDeptController')
                        ->parameters(['' => 'PEAThirdDept']);
                });
            });
    });

    Route::middleware(['cors'])->group(function () {
        Route::name('permissions.')
            ->prefix('permissions')
            ->group(function () {
                Route::apiResource('', 'Permission\PermissionController')
                    ->parameters(['' => 'permission']);
            });
    });

    Route::middleware(['cors'])->group(function () {
        Route::name('user-permissions.')
            ->prefix('user-permissions')
            ->group(function () {
                Route::apiResource('', 'Permission\UserPermissionController')
                    ->parameters(['' => 'userPermission']);
            });
    });

    Route::middleware(['cors'])->group(function () {
        Route::name('dept-dimensions.')
            ->prefix('dept-dimensions')
            ->group(function () {

                Route::post('upload', [DimensionController::class, 'uploadDimensionFile']);

                Route::name('first.')->prefix('first')->group(function () {
                    Route::apiResource('', 'PEADeptDimension\PEAFirstDeptDimensionController')
                        ->parameters(['' => 'firstDimension']);
                });

                Route::name('second.')->prefix('second')->group(function () {
                    Route::apiResource('', 'PEADeptDimension\PEASecondDeptDimensionController')
                        ->parameters(['' => 'secondDimension']);
                });

                Route::name('third.')->prefix('third')->group(function () {
                    Route::apiResource('', 'PEADeptDimension\PEAThirdDeptDimensionController')
                        ->parameters(['' => 'thirdDimension']);
                });

                Route::name('fourth.')->prefix('fourth')->group(function () {
                    Route::apiResource('', 'PEADeptDimension\PEAFourthDeptDimensionController')
                        ->parameters(['' => 'fourthDimension']);
                });
            });
    });
});

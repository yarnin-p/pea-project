<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;

class ResponseAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Successfully',
                'data' => $data
            ]);
        });

        Response::macro('created', function () {
            return response()->json([
                'success' => true,
                'code' => 201,
                'message' => 'Created',
            ], 201);
        });

        Response::macro('updated', function () {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Updated',
            ]);
        });

        Response::macro('deleted', function () {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Deleted',
            ]);
        });

        Response::macro('error', function ($errMsg) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => $errMsg,
            ], 500);
        });

        Response::macro('notFound', function ($errMsg) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => $errMsg,
            ], 404);
        });
    }
}

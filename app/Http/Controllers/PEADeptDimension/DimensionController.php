<?php

namespace App\Http\Controllers\PEADeptDimension;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DimensionController extends Controller
{
    /**
     * @var string
     */
    private string $ctrlName;


    public function __construct()
    {
//        DB::connection()->enableQueryLog();
        $this->ctrlName = 'DimensionController';
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function uploadDimensionFile(Request $request)
    {

        try {

            $files = $request->file('files');
            foreach ($files as $file) {
                Storage::disk('public')->putFileAs('uploads/dimension', $file, $file->getClientOriginalName());
            }



            return Response::created();
        } catch (Exception $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Cannot upload file.");
        }
    }
}

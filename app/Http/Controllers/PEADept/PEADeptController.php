<?php

namespace App\Http\Controllers\PEADept;

use App\Http\Controllers\Controller;
use App\Http\Requests\PEADept\StorePeaDepartmentRequest;
use App\Http\Resources\PEADept\PEAAllDeptResourceCollection;
use App\Http\Resources\PEADept\PEADeptResourceCollection;
use App\Http\Resources\PEADept\PEAFirstDeptResource;
use App\Services\PEADept\IPEAService;
use Illuminate\Http\Request;
use App\Models\PEADept;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PEADeptController extends Controller
{

    private IPEAService $PEADeptService;

    public function __construct(IPEAService $PEADeptService)
    {
        $this->PEADeptService = $PEADeptService;
    }


    /**
     * @return mixed
     */
    public function all()
    {
        try {
//            $peaAllDepartments = PEADept::with(['PEASecondDepts' => function ($PEASecondQuery) {
//                $PEASecondQuery->select('id', 'pea_dept_id', 'name')
//                    ->with(['PEAThirdDepts' => function ($PEAThirdQuery) {
//                        $PEAThirdQuery->select('id', 'pea_dept_id', 'name');
//                    }]);
//            }])->get();
            $PEAAllDepartments = $this->PEADeptService->listPEADept();

        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error('PEADepartmentController@index: [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query PEA department");
        }

        if (!$PEAAllDepartments->isEmpty()) {
            return Response::success(new PEAAllDeptResourceCollection($PEAAllDepartments));
        }

        return Response::notFound('No document(s) found');
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $PEADepartments = $this->PEADeptService->listPEADept();
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error('PEADepartmentController@index: [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query PEA department");
        }

        if (!$PEADepartments->isEmpty()) {
            return Response::success(new PEADeptResourceCollection($PEADepartments));
        }

        return Response::notFound('No document(s) found');
    }


    /**
     * @param StorePeaDepartmentRequest $request
     * @return mixed
     */
    public function store(StorePEADepartmentRequest $request)
    {
        try {
            PEADept::create($request->validated());
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error('PEADepartmentController@store: [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't create PEA first level department");
        }

        return Response::created();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $PEAFirstDepartment = PEADept::where('id', $id)->first();
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error('PEADepartmentController@show: [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't show PEA first level department with given ID");

        }
        return Response::success(new PEAFirstDeptResource($PEAFirstDepartment));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validated();

        try {
            PEADept::where('id', $id)->update($validatedData);
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error('PEADepartmentController@update: [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Update PEA first level department failed.");
        }

        return Response::updated();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            PEADept::where('id', $id)->delete();
        } catch (\Illuminate\Database\QueryException $exception) {
            Log::error('PEADepartmentController@destroy: [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Delete PEA first level department failed.");
        }

        return Response::deleted();
    }
}

<?php

namespace App\Http\Controllers\PEADept;

use App\Http\Controllers\Controller;
use App\Http\Requests\PEADept\StorePeaDepartmentRequest;
use App\Http\Requests\PEADept\UpdatePEADepartmentRequest;
use App\Http\Resources\PEADept\PEAAllDeptResourceCollection;
use App\Http\Resources\PEADept\PEAFirstDeptResourceCollection;
use App\Http\Resources\PEADept\PEAFirstDeptResource;
use App\Models\PEASecondDept;
use App\Services\PEADept\IPEAService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\PEADept;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PEAFirstDeptController extends Controller
{

    /**
     * @var IPEAService
     */
    private IPEAService $PEADeptService;

    /**
     * @var string
     */
    private string $ctrlName;

    /**
     * @param IPEAService $PEADeptService
     */
    public function __construct(IPEAService $PEADeptService)
    {
        $this->PEADeptService = $PEADeptService;
        $this->ctrlName = 'PEAFirstDeptController';
    }

    public function all(Request $request)
    {
        try {
            $PEAAllDepartments = $this->PEADeptService->listAllPEADept();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
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
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query PEA department");
        }

        if (!$PEADepartments->isEmpty()) {
            return Response::success(new PEAFirstDeptResourceCollection($PEADepartments));
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
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't create PEA first level department");
        }

        return Response::created();
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function show(Request $request, $id)
    {
        try {
            $PEAFirstDepartment = PEADept::where('id', $id)->firstOrFail();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't show PEA first level department with given ID");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::success(new PEAFirstDeptResource($PEAFirstDepartment));
    }

    /**
     * @param UpdatePEADepartmentRequest $request
     * @param PEADept $PEAFirstDept
     * @return mixed
     */
    public function update(UpdatePEADepartmentRequest $request, PEADept $PEAFirstDept)
    {
        $validatedData = $request->validated();
        try {
            PEADept::where('id', $PEAFirstDept->id)->update($validatedData);
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Update PEA first level department failed.");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::updated();
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function destroy(Request $request, PEADept $PEAFirstDept)
    {
        try {
            $PEAFirstDept->delete();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Delete PEA first level department failed.");
        }

        return Response::deleted();
    }
}

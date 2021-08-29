<?php

namespace App\Http\Controllers\PEADept;

use App\Http\Controllers\Controller;
use App\Http\Requests\PEADept\StorePEASecondDepartmentRequest;
use App\Http\Requests\PEADept\UpdatePEASecondDepartmentRequest;
use App\Http\Resources\PEADept\PEASecondDeptResource;
use App\Http\Resources\PEADept\PEASecondDeptResourceCollection;
use App\Models\PEASecondDept;
use App\Services\PEADept\IPEAService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PEASecondDeptController extends Controller
{
    /**
     * @var string
     */
    private string $ctrlName;

    /**
     * PEADeptController constructor.
     * @param IPEAService $PEADeptService
     */
    public function __construct()
    {
        $this->ctrlName = 'PEASecondDeptController';
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $PEASecondDepartments = PEASecondDept::all();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query PEA second department");
        }

        if (!$PEASecondDepartments->isEmpty()) {
            return Response::success(new PEASecondDeptResourceCollection($PEASecondDepartments));
        }

        return Response::notFound('No document(s) found');
    }

    /**
     * @param StorePEASecondDepartmentRequest $request
     * @return mixed
     */
    public function store(StorePEASecondDepartmentRequest $request)
    {
        try {
            PEASecondDept::create($request->validated());
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't create PEA second level department");
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
            $PEASecondDepartment = PEASecondDept::where('id', $id)->firstOrFail();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't show PEA second level department with given ID");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::success(new PEASecondDeptResource($PEASecondDepartment));
    }

    /**
     * @param UpdatePEASecondDepartmentRequest $request
     * @param PEASecondDept $PEASecondDept
     * @return mixed
     */
    public function update(UpdatePEASecondDepartmentRequest $request, PEASecondDept $PEASecondDept)
    {
        $validatedData = $request->validated();
        try {
            PEASecondDept::where('id', $PEASecondDept->id)->update($validatedData);
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Update PEA second level department failed.");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::updated();
    }

    /**
     * @param Request $request
     * @param PEASecondDept $PEASecondDept
     * @return mixed
     */
    public function destroy(Request $request, PEASecondDept $PEASecondDept)
    {
        try {
            $PEASecondDept->delete();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Delete PEA second level department failed.");
        }

        return Response::deleted();
    }
}

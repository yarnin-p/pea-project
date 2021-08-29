<?php

namespace App\Http\Controllers\PEADept;

use App\Http\Controllers\Controller;
use App\Http\Requests\PEADept\StorePEAThirdDepartmentRequest;
use App\Http\Requests\PEADept\UpdatePEAThirdDepartmentRequest;
use App\Http\Resources\PEADept\PEAThirdDeptResource;
use App\Http\Resources\PEADept\PEAThirdDeptResourceCollection;
use App\Models\PEAThirdDept;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PEAThirdDeptController extends Controller
{
    /**
     * @var string
     */
    private string $ctrlName;

    /**
     * PEAThirdDeptController constructor.
     */
    public function __construct()
    {
        $this->ctrlName = 'PEAThirdDeptController';
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $PEAThirdDepartments = PEAThirdDept::all();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query PEA third department");
        }

        if (!$PEAThirdDepartments->isEmpty()) {
            return Response::success(new PEAThirdDeptResourceCollection($PEAThirdDepartments));
        }

        return Response::notFound('No document(s) found');
    }

    /**
     * @param StorePEAThirdDepartmentRequest $request
     * @return mixed
     */
    public function store(StorePEAThirdDepartmentRequest $request)
    {
        try {
            PEAThirdDept::create($request->validated());
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't create PEA third level department");
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
            $PEAThirdDepartment = PEAThirdDept::where('id', $id)->firstOrFail();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't show PEA third level department with given ID");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::success(new PEAThirdDeptResource($PEAThirdDepartment));
    }

    /**
     * @param UpdatePEAThirdDepartmentRequest $request
     * @param PEAThirdDept $PEAThirdDept
     * @return mixed
     */
    public function update(UpdatePEAThirdDepartmentRequest $request, PEAThirdDept $PEAThirdDept)
    {
        $validatedData = $request->validated();
        try {
            PEAThirdDept::where('id', $PEAThirdDept->id)->update($validatedData);
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Update PEA third level department failed.");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::updated();
    }

    /**
     * @param Request $request
     * @param PEAThirdDept $PEAThirdDept
     * @return mixed
     */
    public function destroy(Request $request, PEAThirdDept $PEAThirdDept)
    {
        try {
            $PEAThirdDept->delete();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Delete PEA third level department failed.");
        }

        return Response::deleted();
    }
}

<?php

namespace App\Http\Controllers\PEADeptDimension;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dimension\StoreFirstDimensionRequest;
use App\Http\Requests\Dimension\UpdateFirstDimensionRequest;
use App\Http\Resources\Dimension\FirstDimensionResource;
use App\Http\Resources\Dimension\FirstDimensionResourceCollection;
use App\Models\FirstDimension;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PEAFirstDeptDimensionController extends Controller
{
    /**
     * @var string
     */
    private string $ctrlName;


    /**
     *
     */
    public function __construct()
    {
//        DB::connection()->enableQueryLog();
        $this->ctrlName = 'PEAFirstDeptDimensionController';
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $firstDimensions = FirstDimension::all();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query first dimension");
        }

        if (!$firstDimensions->isEmpty()) {
            return Response::success(new FirstDimensionResourceCollection($firstDimensions));
        }

        return Response::notFound('No document(s) found');
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function show(Request $request, $id)
    {
        try {
            $firstDimension = FirstDimension::where('id', $id)->firstOrFail();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't show first dimension with given ID");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::success(new FirstDimensionResource($firstDimension));
    }

    public function store(StoreFirstDimensionRequest $request)
    {
        try {
            FirstDimension::create($request->validated());
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't create first dimension");
        }

        return Response::created();
    }

    /**
     * @param UpdateFirstDimensionRequest $request
     * @param FirstDimension $firstDimension
     * @return mixed
     */
    public function update(UpdateFirstDimensionRequest $request, FirstDimension $firstDimension)
    {
        $validatedData = $request->validated();
        try {
            FirstDimension::where('id', $firstDimension->id)->update($validatedData);
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Update first dimension failed.");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::updated();
    }

    public function destroy()
    {

    }
}

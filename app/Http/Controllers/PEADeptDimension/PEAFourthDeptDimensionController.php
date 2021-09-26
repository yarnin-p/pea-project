<?php

namespace App\Http\Controllers\PEADeptDimension;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dimension\StoreFourthDimensionRequest;
use App\Http\Requests\Dimension\UpdateFourthDimensionRequest;
use App\Http\Resources\Dimension\FourthDimensionResource;
use App\Http\Resources\Dimension\FourthDimensionResourceCollection;
use App\Models\FourthDimension;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PEAFourthDeptDimensionController extends Controller
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
        $this->ctrlName = 'PEAFourthDeptDimensionController';
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $firstDimensions = FourthDimension::all();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query fourth dimension");
        }

        if (!$firstDimensions->isEmpty()) {
            return Response::success(new FourthDimensionResourceCollection($firstDimensions));
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
            $firstDimension = FourthDimension::where('id', $id)->firstOrFail();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't show fourth dimension with given ID");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::success(new FourthDimensionResource($firstDimension));
    }

    /**
     * @param StoreFourthDimensionRequest $request
     * @return mixed
     */
    public function store(StoreFourthDimensionRequest $request)
    {
        try {
            FourthDimension::create($request->validated());
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't create fourth dimension");
        }

        return Response::created();
    }

    /**
     * @param UpdateFourthDimensionRequest $request
     * @param FourthDimension $fourthDimension
     * @return mixed
     */
    public function update(UpdateFourthDimensionRequest $request, FourthDimension $fourthDimension)
    {
        $validatedData = $request->validated();
        try {
            FourthDimension::where('id', $fourthDimension->id)->update($validatedData);
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Update fourth dimension failed.");
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

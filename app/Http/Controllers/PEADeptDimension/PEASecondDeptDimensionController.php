<?php

namespace App\Http\Controllers\PEADeptDimension;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dimension\StoreSecondDimensionRequest;
use App\Http\Requests\Dimension\UpdateSecondDimensionRequest;
use App\Http\Resources\Dimension\SecondDimensionResource;
use App\Http\Resources\Dimension\SecondDimensionResourceCollection;
use App\Models\SecondDimension;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PEASecondDeptDimensionController extends Controller
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
        $this->ctrlName = 'PEASecondDeptDimensionController';
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $secondDimensions = SecondDimension::all();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query second dimension");
        }

        if (!$secondDimensions->isEmpty()) {
            return Response::success(new SecondDimensionResourceCollection($secondDimensions));
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
            $secondDimension = SecondDimension::where('id', $id)->firstOrFail();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't show second dimension with given ID");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::success(new SecondDimensionResource($secondDimension));
    }

    /**
     * @param StoreSecondDimensionRequest $request
     * @return mixed
     */
    public function store(StoreSecondDimensionRequest $request)
    {
        try {
            SecondDimension::create($request->validated());
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't create second dimension");
        }

        return Response::created();
    }

    /**
     * @param UpdateSecondDimensionRequest $request
     * @param SecondDimension $secondDimension
     * @return mixed
     */
    public function update(UpdateSecondDimensionRequest $request, SecondDimension $secondDimension)
    {
        $validatedData = $request->validated();
        try {
            SecondDimension::where('id', $secondDimension->id)->update($validatedData);
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Update second dimension failed.");
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

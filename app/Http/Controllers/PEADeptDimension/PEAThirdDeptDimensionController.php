<?php

namespace App\Http\Controllers\PEADeptDimension;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dimension\StoreThirdDimensionRequest;
use App\Http\Requests\Dimension\UpdateThirdDimensionRequest;
use App\Http\Resources\Dimension\ThirdDimensionResource;
use App\Http\Resources\Dimension\ThirdDimensionResourceCollection;
use App\Models\SecondDimension;
use App\Models\ThirdDimension;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PEAThirdDeptDimensionController extends Controller
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
        $this->ctrlName = 'PEAThirdDeptDimensionController';
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $thirdDimensions = SecondDimension::all();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query third dimension");
        }

        if (!$thirdDimensions->isEmpty()) {
            return Response::success(new ThirdDimensionResourceCollection($thirdDimensions));
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
            $thirdDimension = ThirdDimension::where('id', $id)->firstOrFail();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't show second dimension with given ID");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::success(new ThirdDimensionResource($thirdDimension));
    }

    /**
     * @param StoreThirdDimensionRequest $request
     * @return mixed
     */
    public function store(StoreThirdDimensionRequest $request)
    {
        try {
            ThirdDimension::create($request->validated());
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't create third dimension");
        }

        return Response::created();
    }

    /**
     * @param UpdateThirdDimensionRequest $request
     * @param ThirdDimension $thirdDimension
     * @return mixed
     */
    public function update(UpdateThirdDimensionRequest $request, ThirdDimension $thirdDimension)
    {
        $validatedData = $request->validated();
        try {
            ThirdDimension::where('id', $thirdDimension->id)->update($validatedData);
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Update third dimension failed.");
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

<?php

namespace App\Http\Controllers\PEADept;

use App\Http\Controllers\Controller;
use App\Http\Requests\PEADept\StorePeaDepartmentRequest;
use App\Http\Resources\PEADept\PEADeptResourceCollection;
use App\Services\PEADept\IPEAService;
use Illuminate\Http\Request;
use App\Models\PEADept;
use Illuminate\Support\Facades\Log;

class PEADepartmentController extends Controller
{

    private IPEAService $PEADeptService;

    public function __construct(IPEAService $PEADeptService)
    {
        $this->PEADeptService = $PEADeptService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $results = [];
        $peaDepartments = $this->PEADeptService->listPEADept();
        if (!$peaDepartments->isEmpty()) {
            $results = new PEADeptResourceCollection($peaDepartments);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully',
            'data' => $results
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\PEADept\StorePeaDepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePeaDepartmentRequest $request)
    {
        try {
            PEADept::create($request->validated());
            return response()->json([
                'success' => true,
                'code' => 201,
                'message' => 'Created',
                'data' => (object)[],
            ], 201);
        } catch (\Illuminate\Database\QueryException $ex) {
            Log::error('PeaDepartmentController@store: [' . $ex->getCode() . '] ' . $ex->getMessage());
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Could not create PEA department.',
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $peaDepartment = PEADept::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully',
            'data' => $peaDepartment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        if (PEADept::where('id', $id)->update($validatedData)) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Updated',
                'data' => (object)[],
            ]);
        }

        return response()->json([
            'success' => false,
            'code' => 500,
            'message' => 'Update PEA department not successful.',
        ], 500);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if (PEADept::where('id', $id)->delete()) {
            return response()->json([], 204);
        }

        return response()->json([
            'success' => false,
            'code' => 500,
            'message' => 'Delete PEA department not successful.',
        ], 500);
    }
}

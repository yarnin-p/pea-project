<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StoreUserPermissionRequest;
use App\Http\Requests\Permission\UpdateUserPermissionRequest;
use App\Http\Resources\Permission\UserPermissionResource;
use App\Http\Resources\Permission\UserPermissionResourceCollection;
use App\Models\UserPermission;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UserPermissionController extends Controller
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
        $this->ctrlName = 'UserPermissionController';
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $userPermissions = UserPermission::with(['permissions' => function ($permissionQuery) {
                $permissionQuery->select('id', 'method', 'endpoint');
            }, 'users' => function ($userQuery) {
                $userQuery->select('id', 'name');
            }])->get();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query user permission");
        } catch (RelationNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Relation not found");
        }

        if (!$userPermissions->isEmpty()) {
            return Response::success(new UserPermissionResourceCollection($userPermissions));
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
            $userPermission = UserPermission::with(['permissions' => function ($permissionQuery) {
                $permissionQuery->select('id', 'method', 'endpoint');
            }, 'users' => function ($userQuery) {
                $userQuery->select('id', 'name');
            }])->where('id', $id)->firstOrFail();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't show user permission with given ID");
        } catch (RelationNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Relation not found");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }
        return Response::success(new UserPermissionResource($userPermission));
    }

    /**
     * @param StoreUserPermissionRequest $request
     * @return mixed
     */
    public function store(StoreUserPermissionRequest $request)
    {
        try {
            UserPermission::create($request->validated());
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't create user permission");
        }

        return Response::created();
    }

    /**
     * @param UpdateUserPermissionRequest $request
     * @param UserPermission $userPermission
     * @return mixed
     */
    public function update(UpdateUserPermissionRequest $request, UserPermission $userPermission)
    {
        $validatedData = $request->validated();
        try {
            UserPermission::where('id', $userPermission->id)->update($validatedData);
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Update user permission failed.");
        } catch (ModelNotFoundException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::notFound('No document(s) found');
        }

        return Response::updated();
    }

    /**
     * @param Request $request
     * @param UserPermission $userPermission
     * @return mixed
     */
    public function destroy(Request $request, UserPermission $userPermission)
    {
        try {
            $userPermission->delete();
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Delete user permission failed.");
        }

        return Response::deleted();
    }
}

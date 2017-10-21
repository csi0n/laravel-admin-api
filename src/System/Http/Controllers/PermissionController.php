<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:01 AM
 */

namespace csi0n\LaravelAdminApi\System\Http\Controllers;


use csi0n\LaravelAdminApi\System\Http\Requests\PermissionRequest;
use csi0n\LaravelAdminApi\System\Services\PermissionService;
use csi0n\LaravelAdminApi\System\Traits\ApiResponse;
use Illuminate\Routing\Controller;

class PermissionController extends Controller
{
    use ApiResponse;
    protected $permissionService;

    /**
     * PermissionController constructor.
     *
     * @param $permissionService
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        return \Response::json($this->permissionService->index());
    }

    /**
     * @param PermissionRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed
     */
    public function store(PermissionRequest $request)
    {
        if ($this->permissionService->store($request)) {
            return $this->success();
        }

        return $this->failed();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        if ($permission = $this->permissionService->show($id)) {
            return $this->success($permission);
        }

        return $this->failed();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        if ($permission = $this->permissionService->edit($id)) {
            return $this->success($permission);
        }

        return $this->failed();
    }

    /**
     * @param PermissionRequest $request
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed
     */
    public function update(PermissionRequest $request, $id)
    {
        if ($this->permissionService->update($request, $id)) {
            return $this->success();
        }

        return $this->failed();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed
     */
    public function destroy($id)
    {
        if ($this->permissionService->destroy($id)) {
            return $this->success();
        }

        return $this->failed();
    }
}
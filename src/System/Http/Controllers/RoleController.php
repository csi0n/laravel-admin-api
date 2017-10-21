<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:01 AM
 */

namespace csi0n\LaravelAdminApi\System\Http\Controllers;


use csi0n\LaravelAdminApi\System\Http\Requests\RoleRequest;
use csi0n\LaravelAdminApi\System\Services\RoleService;
use csi0n\LaravelAdminApi\System\Traits\ApiResponse;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    use ApiResponse;
    protected $roleService;

    /**
     * RoleController constructor.
     *
     * @param $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        return \Response::json($this->roleService->index());
    }

    /**
     * @param RoleRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed
     */
    public function store(RoleRequest $request)
    {
        if ($this->roleService->store($request)) {
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
        if ($role = $this->roleService->show($id)) {
            return $this->success($role);
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
        if ($role = $this->roleService->edit($id)) {
            return $this->success($role);
        }

        return $this->failed();
    }

    /**
     * @param RoleRequest $request
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed
     */
    public function update(RoleRequest $request, $id)
    {
        if ($this->roleService->update($request, $id)) {
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
        if ($this->roleService->destroy($id)) {
            return $this->success();
        }

        return $this->failed();
    }
}
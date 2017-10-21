<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:01 AM
 */

namespace csi0n\LaravelAdminApi\System\Http\Controllers;


use csi0n\LaravelAdminApi\System\Http\Requests\UserRequest;
use csi0n\LaravelAdminApi\System\Services\UserService;
use csi0n\LaravelAdminApi\System\Traits\ApiResponse;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    use ApiResponse;
    protected $userService;

    /**
     * UserController constructor.
     *
     * @param $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return \Response::json($this->userService->index());
    }

    /**
     * @param UserRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed
     */
    public function store(UserRequest $request)
    {
        if ($this->userService->store($request)) {
            return ApiResponseService::success();
        }

        return ApiResponseService::fail();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        if ($user = $this->userService->show($id)) {
            return $this->success($user);
        }

        return $this->failed();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if ($user = $this->userService->edit($id)) {
            return $this->success($user);
        }

        return $this->failed();
    }

    /**
     * @param UserRequest $request
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed
     */
    public function update(UserRequest $request, $id)
    {
        if ($this->userService->update($request, $id)) {
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
        if ($this->userService->destroy($id)) {
            return $this->success();
        }

        return $this->failed();
    }
}
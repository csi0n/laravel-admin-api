<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:01 AM
 */

namespace csi0n\LaravelAdminApi\System\Http\Controllers;


use csi0n\LaravelAdminApi\System\Http\Requests\MenuRequest;
use csi0n\LaravelAdminApi\System\Http\Requests\SortMenuRequest;
use csi0n\LaravelAdminApi\System\Services\ApiResponseService;
use csi0n\LaravelAdminApi\System\Services\MenuService;
use Illuminate\Routing\Controller;

class MenuController extends Controller
{
    protected $menuService;

    public function index()
    {
        return response()->json($this->menuService->index());
    }

    /**
     * MenuController constructor.
     *
     * @param $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @param MenuRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function store(MenuRequest $request)
    {
        if ($this->menuService->store($request)) {
            return ApiResponseService::success();
        } else {
            return ApiResponseService::fail();
        }
    }


    /**
     * @param $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        if ($menu = $this->menuService->edit($id)) {
            return ApiResponseService::success($menu);
        } else {
            return ApiResponseService::fail();
        }
    }

    /**
     * @param MenuRequest $request
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed
     */
    public function update(MenuRequest $request, $id)
    {
        if ($this->menuService->update($request, $id)) {
            return ApiResponseService::success();
        }

        return ApiResponseService::fail();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed
     */
    public function destroy($id)
    {
        if ($this->menuService->destroy($id)) {
            return ApiResponseService::success();
        }

        return ApiResponseService::fail();
    }

    public function sort(SortMenuRequest $request)
    {
        if ($this->menuService->sort($request)) {
            return ApiResponseService::success();
        }

        return ApiResponseService::fail();
    }
}
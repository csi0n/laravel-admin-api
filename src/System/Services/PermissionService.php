<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:07 AM
 */

namespace csi0n\LaravelAdminApi\System\Services;


use csi0n\LaravelAdminApi\System\Http\Requests\PermissionRequest;
use csi0n\LaravelAdminApi\System\Repositories\PermissionRepository;
use DatatablesRepository,DB;

class PermissionService
{
    protected $permissionRepository;

    /**
     * PermissionService constructor.
     *
     * @param $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function store(PermissionRequest $request)
    {
        return $this->permissionRepository->store($request->all());
    }

    public function edit($id)
    {
        return $this->permissionRepository->find($id);
    }

    public function show($id)
    {
        return $this->permissionRepository->find($id);
    }

    public function update(PermissionRequest $request, $id)
    {
        return $this->permissionRepository->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->permissionRepository->destroy($id);
    }

    public function index()
    {
        if (request()->has('type') && request()->type === 'all') {
            return $this->permissionRepository->getModel()->all();
        }

        return DatatablesRepository::config(config('laravel-admin-api.datatables.permission'))
            ->model($this->permissionRepository->getModel())
            ->render(function ($item) {
                $item['optionsButton'] = $item->allButton();

                return $item;
            });
    }
}
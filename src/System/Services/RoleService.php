<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:07 AM
 */

namespace csi0n\LaravelAdminApi\System\Services;


use csi0n\LaravelAdminApi\System\Http\Requests\RoleRequest;
use csi0n\LaravelAdminApi\System\Repositories\PermissionRepository;
use csi0n\LaravelAdminApi\System\Repositories\RoleRepository;
use Illuminate\Support\Collection;
use DatatablesRepository,DB;
class RoleService
{
    protected $permissionRepository;
    protected $roleRepository;

    /**
     * RoleService constructor.
     *
     * @param $permissionRepository
     * @param $roleRepository
     */
    public function __construct(PermissionRepository $permissionRepository, RoleRepository $roleRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
    }

    public function store(RoleRequest $request)
    {
        try {
            \DB::beginTransaction();

            return $this->roleRepository->store(
                $request->all(),
                $this->syncPermission($request));
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e);

            return false;
        }
    }

    public function show($id)
    {
        return $this->roleRepository->with(['perms'])->find($id);
    }

    public function edit($id)
    {
        return $this->roleRepository->with(['perms'])->find($id);
    }

    public function update(RoleRequest $request, $id)
    {
        try {
            \DB::beginTransaction();

            return $this->roleRepository->update($request->all(),
                $id,
                $this->syncPermission($request));
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e);

            return false;
        }
    }

    private function syncPermission(RoleRequest $request)
    {
        return function ($role) use ($request) {
            if ($request->has('permissions') &&
                is_array($permissions = $request->permissions)
            ) {
                if (empty($permissions)) {
                    $role->perms()->sync([]);
                } else {
                    $permissions = $this->permissionRepository
                        ->find($permissions);
                    if ($permissions instanceof Collection) {
                        $permissions = $permissions->pluck('id');
                        if ($permissions->isNotEmpty()) {
                            $role->perms()->sync($permissions);
                        }
                    }
                }
            }
            \DB::commit();

            return true;
        };
    }

    public function destroy($id)
    {
        return $this->roleRepository->destroy($id);
    }

    public function index()
    {
        if (request()->has('type') && request()->type === 'all') {
            return $this->roleRepository->getModel()->all();
        }

        return DatatablesRepository::config(config('laravel-admin-api.datatables.role'))
            ->model($this->roleRepository->getModel())
            ->render(function ($item) {
                $item['optionsButton'] = $item->allButton();

                return $item;
            });
    }
}
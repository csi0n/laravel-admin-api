<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:07 AM
 */

namespace csi0n\LaravelAdminApi\System\Services;


use csi0n\LaravelAdminApi\System\Http\Requests\UserRequest;
use csi0n\LaravelAdminApi\System\Repositories\PermissionRepository;
use csi0n\LaravelAdminApi\System\Repositories\RoleRepository;
use csi0n\LaravelAdminApi\System\Repositories\UserRepository;
use Illuminate\Support\Collection;
use DB;
use DatatablesRepository;

class UserService
{
    protected $userRepository;
    protected $roleRepository;
    protected $permissionRepository;
    protected $organizationGroupRelationRepository;
    protected $riskControlModuleRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     * @param RoleRepository $roleRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }


    public function store(UserRequest $request)
    {
        try {
            \DB::beginTransaction();

            return $this->userRepository->store(
                $request->all(),
                $this->syncRoleAndPermissions($request));
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e);

            return false;
        }
    }


    public function edit($id)
    {
        return $this->userRepository->with(['roles', 'perms'])->find($id);
    }

    public function update(UserRequest $request, $id)
    {
        try {
            return $this->userRepository->update(
                $request->all(),
                $id,
                $this->syncRoleAndPermissions($request));
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e);

            return false;
        }
    }

    public function destroy($id)
    {
        return $this->userRepository->destroy($id);
    }

    public function show($id)
    {
        return $this->userRepository->with([
            'perms',
            'roles',
        ])->find($id);
    }

    public function index()
    {
        if (request()->has('type') && request()->type === 'all') {
            return $this->userRepository->getModel()->all();
        }

        return DatatablesRepository::config(config('laravel-admin-api.datatables.user'))
            ->model($this->userRepository->getModel())
            ->render(function ($item) {
                $item->optionsButton = $item->allButton();

                return $item;
            });
    }

    private function syncRoleAndPermissions(UserRequest $request)
    {
        return function ($user) use ($request) {
            if ($request->has('roles') && is_array($roles = $request->roles)) {
                if (empty($roles)) {
                    $user->roles()->sync([]);
                } else {
                    $roles = $this->roleRepository->find($request->roles);
                    if ($roles instanceof Collection && $roles->isNotEmpty()) {
                        $roles = $roles->pluck('id');
                        $user->roles()->sync($roles);
                    }
                }
            }
            if ($request->has('permissions') && is_array($permissions = $request->permissions)) {
                if (empty($permissions)) {
                    $user->perms()->sync([]);
                } else {
                    $permissions = $this->permissionRepository->find($permissions);
                    if ($permissions instanceof Collection && $permissions->isNotEmpty()) {
                        $permissions = $permissions->pluck('id');
                        $user->perms()->sync($permissions);
                    }
                }
            }
//            if ($request->get('send_password_change_email', false) && !empty($request->password)) {
//                \Mail::to($user)->send(new UserChangePasswordSuccess($user, $request->password));
//            }
//            if ($request->get('send_created_success_email', false) && !empty($request->password)) {
//                \Mail::to($user)->send(new UserCreateSuccess($user, $request->password));
//            }
            \DB::commit();

            return true;
        };
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:05 AM
 */

namespace csi0n\LaravelAdminApi\System\Repositories;


use csi0n\LaravelAdminApi\System\Entities\Permission;
use Illuminate\Support\Collection;

class PermissionRepository extends Repository
{

    public function model(): string
    {
        return Permission::class;
    }

    public function getCurrentUserPermission($guard = null): Collection
    {
        global $permissions;
        if ($permissions instanceof Collection) {
            return $permissions;
        }
        $permissions = user($guard)->perms()->get();
        user($guard)->roles()->each(function ($role) use (&$permissions) {
            $permissions = $permissions->merge($role->perms()->get());
        });

        return $permissions;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 11:37 AM
 */

namespace csi0n\LaravelAdminApi\System\Traits;


use csi0n\LaravelAdminApi\System\Repositories\PermissionRepository;
use Illuminate\Support\Collection;

trait SimplePermissionClassTrait
{
    public function hasClassPermissionByClassMethod($class, $method)
    {
        if ($cachedClassPermissions = $this->cachedClassPermissions()) {
            foreach ($cachedClassPermissions as $cachedClassPermission) {
                if ($cachedClassPermission['type'] === 'class'
                    && $class === $cachedClassPermission['class']) {
                    return array_search($method, $cachedClassPermission['data']) !== false;
                }
            }
        }

        return false;
    }

    public function hasButtonPermissionByClassButton($class, $button)
    {
        if ($cachedClassPermissions = $this->cachedClassPermissions()) {
            foreach ($cachedClassPermissions as $cachedClassPermission) {
                if ($cachedClassPermission['type'] === 'button'
                    && $class === $cachedClassPermission['class']) {
                    return array_search($button, $cachedClassPermission['data']) !== false;
                }
            }
        }

        return false;
    }


    public function forgetPermissionClassSettingsCache()
    {
        \Cache::tags(['permissions'])->flush();

        return true;
    }


    public function getCurrentUserPermissions()
    {
        global $permissions;
        if (!$permissions instanceof Collection) {
            $permissions = app(PermissionRepository::class)
                ->getCurrentUserPermission();
        }

        return $permissions;
    }


    public function cachedClassPermissions($guard = null)
    {
//		todo 发布的时候权限对应的设置需要永久缓存，取消小面的清除缓存操作
        if (is_debug()) {
            $this->forgetPermissionClassSettingsCache();
        }
        $user = user($guard);
        $permissions = $this->getCurrentUserPermissions();
        $permissionsClassSettings = [];
        $permissions->map(function ($permission) use (&$permissionsClassSettings, $user) {
            $class_setting = $permission->class_settings;
            $classSettings = explode(PHP_EOL, $class_setting);
            foreach ($classSettings as $class_setting) {
                preg_match("/(class|button)\|(.*)\[(.*)\]/", $class_setting, $class_setting);
                if (sizeof($class_setting) === 4) {
                    $isExist = false;
                    foreach ($permissionsClassSettings as &$permissionsClassSetting) {
                        if ($permissionsClassSetting['type'] === $class_setting[1] && $permissionsClassSetting['class'] === $class_setting[2]) {
                            $isExist = true;
                            $permissionsClassSetting['data'] = array_merge(
                                $permissionsClassSetting['data'],
                                explode(',', $class_setting[3])
                            );
                            continue;
                        }
                    }
                    if (!$isExist) {
                        $permissionsClassSettings[] = [
                            'type' => $class_setting[1],
                            'class' => $class_setting[2],
                            'data' => explode(',', $class_setting[3])
                        ];
                    }
                }
            }
        });

        return $permissionsClassSettings;
    }
}
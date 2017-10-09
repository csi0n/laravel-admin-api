<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:06 AM
 */

namespace csi0n\LaravelAdminApi\System\Services;


use csi0n\LaravelAdminApi\System\Http\Requests\MenuRequest;
use csi0n\LaravelAdminApi\System\Http\Requests\SortMenuRequest;
use csi0n\LaravelAdminApi\System\Repositories\MenuRepository;
use csi0n\LaravelAdminApi\System\Repositories\PermissionRepository;
use Illuminate\Support\Collection;

class MenuService
{
    protected $menuRepository;

    protected $permissionRepository;

    /**
     * MenuService constructor.
     *
     * @param MenuRepository $menuRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(MenuRepository $menuRepository, PermissionRepository $permissionRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function store(MenuRequest $request)
    {
        $this->clearMenuCache();

        return $this->menuRepository->store($request->all());
    }

    public function update(MenuRequest $request, $id)
    {
        $this->clearMenuCache();

        return $this->menuRepository->update($request->all(), $id);
    }

    public function edit($id)
    {
        return $this->menuRepository->find($id);
    }

    public function index($refresh = false): Collection
    {
        if ($refresh || is_debug()) {
            $this->clearMenuCache();
        }

        return $this->recursionPermissionMenu(
            $this->cacheMenuLists()
        );

    }

    private function recursionPermissionMenu($menus): Collection
    {
        $permissions = $this->permissionRepository->getCurrentUserPermission();

        return $menus->reject(function ($menu) use ($permissions) {
            return !$permissions->contains('name', $menu->slug);
        })->map(function ($menu) {
            if ($menu->child instanceof Collection && $menu->child->isNotEmpty()) {
                $menu->child = $this->recursionPermissionMenu($menu->child);
            }

            return $menu;
        });
    }


    public function destroy($id)
    {
        return $this->menuRepository->destroy($id);
    }

    public function sort(SortMenuRequest $request)
    {
        $menu = $this->menuRepository->find($request->currentItemId);
        if (!is_null($menu)) {
            $menu->pid = $request->itemParentId;
            if ($menu->save()) {
                $this->clearMenuCache();

                return true;
            }
        }

        return false;
    }

    public function cacheMenuLists()
    {
        return \Cache::rememberForever($this->getCacheKey(), function () {
            $menus = $this->menuRepository->queryEnableMenus();

            return $this->sortMenus($menus);
        });
    }

    private function sortMenus(&$menus, $pid = 0)
    {
        if ($menus instanceof Collection) {
            $result = collect([]);
            $menus->map(function ($item) use (&$result, $menus, $pid) {
                if ($item->pid == $pid) {
                    $item['child'] = self::sortMenus($menus, $item->id);
                    $result->push($item);
                }
            });

            return $result;
        }

        return collect([]);
    }

    private function clearMenuCache()
    {
        if (\Cache::has($this->getCacheKey())) {
            \Cache::forget($this->getCacheKey());
        }
    }

    private function getCacheKey()
    {
        return config('laravel-admin-api.cache.menuCacheKey');
    }

}
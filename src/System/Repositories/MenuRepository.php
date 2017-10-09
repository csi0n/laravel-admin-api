<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:02 AM
 */

namespace csi0n\LaravelAdminApi\System\Repositories;


use csi0n\LaravelAdminApi\System\Entities\Menu;
use Illuminate\Support\Collection;

class MenuRepository extends Repository
{

    public function model(): string
    {
        return Menu::class;
    }

    public function queryEnableMenus($language = 'zh'): Collection
    {
        return $this->getModel()->whereLanguage($language)
            ->status()
            ->get();
    }
}
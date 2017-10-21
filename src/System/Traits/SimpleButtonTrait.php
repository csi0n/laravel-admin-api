<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 11:37 AM
 */

namespace csi0n\LaravelAdminApi\System\Traits;


trait SimpleButtonTrait
{
    use SimplePermissionClassTrait;

    public function showButton()
    {
        return $this->checkPermission('show');
    }

    public function editButton()
    {
        return $this->checkPermission('edit');
    }

    public function destroyButton()
    {
        return $this->checkPermission('destroy');
    }

    public function allButton()
    {
        if (property_exists($this, 'appendButton')) {
            $hasPermissionButton = [];
            foreach ($this->appendButton as $button) {
                if ($this->checkPermission($button)) {
                    array_push($hasPermissionButton, $button);
                }
            }
            $appendButton = $hasPermissionButton;
        } else {
            $appendButton = [];
        }

        return array_flatten(
            array_filter(
                array_merge($appendButton, [
                    $this->showButton(),
                    $this->editButton(),
                    $this->destroyButton(),
                ])));
    }

    private function checkPermission($alias)
    {
        return $this->hasButtonPermissionByClassButton(get_called_class(), $alias) ? $alias : '';
    }
}
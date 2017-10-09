<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 9:54 AM
 */

namespace csi0n\LaravelAdminApi\System\Entities;


use csi0n\LaravelAdminApi\System\Traits\SimpleButtonTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use SimpleButtonTrait;
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];
}
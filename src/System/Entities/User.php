<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 9:54 AM
 */

namespace csi0n\LaravelAdminApi\System\Entities;

use csi0n\LaravelAdminApi\System\Traits\SimpleButtonTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait, SimpleButtonTrait;

    private $appendButton = [
        'reset-password'
    ];
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
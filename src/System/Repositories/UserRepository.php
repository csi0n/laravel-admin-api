<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:05 AM
 */

namespace csi0n\LaravelAdminApi\System\Repositories;


use csi0n\LaravelAdminApi\System\Entities\User;

class UserRepository extends Repository
{

    public function model(): string
    {
        return User::class;
    }
}
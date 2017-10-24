<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 9:59 AM
 */

namespace csi0n\LaravelAdminApi\System\Http\Requests;


use csi0n\Laravel\Request\Request\CLaravelRequest;

class PermissionRequest extends CLaravelRequest
{

    public function setCRule()
    {
        // TODO: Implement setCRule() method.
    }
    public function authorize()
    {
        return \Auth::check();
    }
}
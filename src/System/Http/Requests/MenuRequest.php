<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 9:58 AM
 */

namespace csi0n\LaravelAdminApi\System\Http\Requests;


use csi0n\Laravel\Request\Request\CLaravelRequest;

class MenuRequest extends CLaravelRequest
{

    public function setCRule()
    {

    }

    public function authorize()
    {
        return \Auth::check();
    }
}
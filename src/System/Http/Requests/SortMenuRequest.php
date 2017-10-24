<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:40 AM
 */

namespace csi0n\LaravelAdminApi\System\Http\Requests;


use csi0n\Laravel\Request\Request\CLaravelRequest;

class SortMenuRequest extends CLaravelRequest
{
    public function setCRule()
    {
        \CRule::COMMON([
            'currentItemId'=>'required|numeric',
            'itemParentId'=>'required|numeric'
        ]);
    }
    public function authorize()
    {
        return \Auth::check();
    }
}
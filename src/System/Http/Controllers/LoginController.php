<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:00 AM
 */

namespace csi0n\LaravelAdminApi\System\Http\Controllers;


use csi0n\LaravelAdminApi\System\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    protected $loginService;

    /**
     * LoginController constructor.
     * @param $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(Request $request)
    {
        return $this->loginService->login($request);
    }

    public function logout(Request $request)
    {
        return $this->loginService->logout($request);
    }

    public function __call($method, $parameters)
    {
        if (method_exists($this->loginService, $method)) {
            return call_user_func_array([$this->loginService, $method], $parameters);
        }
        parent::__call($method, $parameters);
    }


}
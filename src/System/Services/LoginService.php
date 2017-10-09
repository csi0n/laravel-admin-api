<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:08 AM
 */

namespace csi0n\LaravelAdminApi\System\Services;


use csi0n\LaravelAdminApi\System\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

class LoginService
{

    /**
     * The default error bag.
     *
     * @var string
     */
    protected $validatesRequestErrorBag;

    use ValidatesRequests, AuthenticatesUsers;
    protected $userRepository;

    /**
     * LoginService constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'captcha' => 'captcha'
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->status !== 'enable') {
            auth()->logout();
            if ($request->expectsJson()) {
                return $this->buildFailedValidationResponse($request, ['status' => ['用户已经被锁定']]);
            }
        }
        return response()->json();
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        if ($request->expectsJson()) {
            return new JsonResponse($errors, 422);
        }

        return redirect()->to($this->getRedirectUrl())
            ->withInput($request->input())
            ->withErrors($errors, $this->errorBag());
    }

    protected function getRedirectUrl()
    {
        return app(UrlGenerator::class)->previous();
    }

    protected function errorBag()
    {
        return $this->validatesRequestErrorBag ?: 'default';
    }

}
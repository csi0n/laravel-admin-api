<?php
/**
 * Created by PhpStorm.
 * Date: 2015/12/3
 * Author: jBoy1009
 */

namespace csi0n\LaravelAdminApi\System\Services;

use Response;
class ApiResponseService
{

    public static function success($result = [], $message = 'success', $statusCode = 200, $header = [])
    {
        if( (is_array($result) or is_object($result)) AND !empty($result)){
            $responseResult['message']   = $message;
            $responseResult['result']   = $result;
        }elseif(func_num_args() === 0){
            $responseResult['message']  = $message;
            $responseResult['result']  = [];
        }
        else{
            $responseResult['message']  = $result;
            $responseResult['result']  = [];
        }

        $responseResult['status']  = $statusCode;
        return Response::json($responseResult, $statusCode, array_merge(['server-response-code'=> $statusCode], $header));
    }

    public static function fail($message = 'fail', $statusCode = 500, $result = [])
    {
        $responseResult = ['message' => $message, 'result'=> $result, 'status'=>$statusCode];
        return Response::json($responseResult, $statusCode, ['server-response-code'=>$statusCode]);
    }
}
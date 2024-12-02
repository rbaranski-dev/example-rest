<?php

namespace App\Classes;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class ApiResponse
{
    /**
     * Summary of throw
     * @param string $e
     * @param string $message
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     * @return never
     */
    public static function throw(string $e, string $message = "Internal Server Error")
    {
        Log::error($e);
        throw new HttpResponseException(response()->json(["message" => $message], 500));
    }

    /**
     * Summary of sendResponse
     * @param mixed $result
     * @param mixed $message
     * @param mixed $code
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public static function sendResponse($result, $message = null, $code = 200)
    {
        $response = [
            'success' => true,
            'data' => $result
        ];
        if (!empty($message)) {
            $response['message'] = $message;
        }
        return response()->json($response, $code);
    }
}

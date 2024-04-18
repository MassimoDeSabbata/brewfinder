<?php

namespace App\Classes;

use Illuminate\Support\Facades\Log;

class ApiResponseClass
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function sendErrorResponse($exception = null, $message = null, $code = 500)
    {
        $response = [
            'success' => false
        ];

        $response['message'] = 'Something went wrong';
        if ($message) {
            $response['message'] = $message;
        }

        if ($exception) {
            Log::error($exception);
        }

        return response()->json($response, $code);
    }

    public static function sendSuccessResponse($result, $message = null, $code = 200)
    {
        $response = [
            'success' => true,
            'data'    => $result
        ];
        if (!empty($message)) {
            $response['message'] = $message;
        }
        return response()->json($response, $code);
    }
}

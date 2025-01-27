<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * success response method.
     * @param $result
     * @param $message
     * @return JsonResponse
     */
    public function sendResponse($result, $message): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response,  200);
    }

    /**
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function sendError($error, array $errorMessages = [], int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,

        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    /**
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function unauthorizedError($error, array $errorMessages = [], int $code = 401): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,

        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    /**
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function sendValidationError($error, array $errorMessages = [], int $code = 500)
    {
        $response = [
            'success' => false,
            'message' => $error,

        ];


        if (!empty($errorMessages)) {
            $formattedErrors = [];
            foreach ($errorMessages->toArray() as $key => $messages) {
                $formattedErrors[$key] = $messages[0]; // Assuming you want to take the first error message for each field
            }
            $response['errors'] = $formattedErrors;
        }

        return response()->json($response, $code);
    }

    /**
     * Extend response data
     * @param $array
     * @param array $keys
     * @return array
     */
    public function extend($array, array $keys = []): array
    {
        return array_merge($array, $keys);
    }
}


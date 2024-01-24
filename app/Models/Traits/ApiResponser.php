<?php

namespace App\Models\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    /**
     * @param $data
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse(array $data = [], string $message = null): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
        ], JsonResponse::HTTP_OK );
    }

    /**
     * @param $error
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse(
        string $error, 
        $code = JsonResponse::HTTP_INTERNAL_SERVER_ERROR, 
        string $message = null
    ): JsonResponse
    {
        return response()->json([
            'message' => $message ?? __('api::common.operation_failed'), 
            'errors' => [
                $this->defineKey($error) => [
                    $error
                ]
            ], 
        ], $code);
    }
    
    /**
     * @param $error
     */
    private function defineKey(string $error): string
    {
        $key = explode(' ', trim($error))[0];

        return strtolower($key);
    }
}

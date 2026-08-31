<?php

namespace App\Responses;

use Psr\Http\Message\ResponseInterface;

final class ApiResponse
{
    public static function success(
        ResponseInterface $response,
        mixed $data = null,
        array $meta = [],
        array $debug = [],
        int $status = 200
    ): ResponseInterface {
        return self::json(
            response: $response,
            payload: [
                'success' => true,
                'meta' => $meta,
                'debug' => $debug,
                'data' => $data,
            ],
            status: $status
        );
    }

    public static function error(
        ResponseInterface $response,
        string $message,
        int $status = 500,
        array $details = []
    ): ResponseInterface {
        return self::json(
            response: $response,
            payload: [
                'success' => false,
                'error' => [
                    'message' => $message,
                    'details' => $details,
                ],
            ],
            status: $status
        );
    }

    private static function json(
        ResponseInterface $response,
        array $payload,
        int $status
    ): ResponseInterface {
        $json = json_encode(
            $payload,
            JSON_PRETTY_PRINT |
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );

        if ($json === false) {
            $json = json_encode([
                'success' => false,
                'error' => [
                    'message' => 'Failed to encode response.',
                ],
            ]);
        }

        $response->getBody()->write($json);

        return $response
            ->withStatus($status)
            ->withHeader('Content-Type', 'application/json; charset=utf-8');
    }
}
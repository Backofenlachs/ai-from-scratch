<?php

namespace App\Controllers;

use App\Neural\NeuralNetwork;
use App\Responses\ApiResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class NNController {
    public function __construct(
        private NeuralNetwork $network
    ) {}

    public function predict(Request $request, Response $response): Response {
        $queryParams = $request->getQueryParams();

        if(!isset($queryParams['inputs'])) {
            return ApiResponse::error(
                response: $response,
                message: 'Missing query parameter: inputs',
                status: 400
            );
        }

        $inputs = array_map('floatval', explode(',', $queryParams['inputs']));

        $outsAndLog = $this->network->forward($inputs);

        return ApiResponse::success(
            response: $response,
            data: [
                'inputs' => $inputs,
                'outputs' => $outsAndLog['outputs']
            ],
            debug: $outsAndLog['log']
        );
    }
}
<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpException;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';


use App\Responses\ApiResponse;
use App\Controllers\NNController;
use App\Neural\NeuralNetwork;
use App\Neural\Neuron;

// --------------------------------------------------
// App
// --------------------------------------------------

$app = AppFactory::create();


// --------------------------------------------------
// Error handling
// --------------------------------------------------

$errorMiddleware = $app->addErrorMiddleware(
    true,
    false,
    false
);

$errorMiddleware->setDefaultErrorHandler(
    function (
        Request $request,
        Throwable $exception,
        bool $displayErrorDetails,
        bool $logErrors,
        bool $logErrorDetails
    ) use ($app): Response {

        $response = $app
            ->getResponseFactory()
            ->createResponse();

        $status = 500;

        if ($exception instanceof HttpException) {
            $status = $exception->getCode();
        }

        $details = [];

        if ($displayErrorDetails) {
            $details = [
                'type' => $exception::class,
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ];
        }

        return ApiResponse::error(
            response: $response,
            message: $exception->getMessage() ?: 'Internal server error.',
            status: $status,
            details: $details
        );
    }
);


// --------------------------------------------------
// Request timing
// --------------------------------------------------

$app->add(
    function (
        Request $request,
        RequestHandlerInterface $handler
    ): Response {

        $start = microtime(true);

        $response = $handler->handle($request);

        $durationMs = (microtime(true) - $start) * 1000;

        $formattedDuration = number_format(
            $durationMs,
            3,
            '.',
            ''
        );

        error_log(
            sprintf(
                '[%s] %s -> %s ms',
                $request->getMethod(),
                $request->getUri()->getPath(),
                $formattedDuration
            )
        );

        return $response->withHeader(
            'X-Response-Time',
            $formattedDuration . ' ms'
        );
    }
);


// --------------------------------------------------
// Routes
// --------------------------------------------------

$app->get( '/', function (Request $request, Response $response): Response {

        return ApiResponse::success(
            response: $response,
            data: [
                'message' => 'Neural Network API'
            ]
        );
    }
);

/** Aktueller zwischen Stand:
 * Es wird simuliert. wie eine eingabe schicht alle werte addiert und multipliziert werden der werte für das erste output neuron der nächsten schicht (im prinzip)
 * 
 * Neuron Aufbau siehe: docs/simple-neuron.pdf
 */
$app->get('/ai', function (Request $request, Response $response): Response {

    $n1 = new Neuron(
        weights: [
            0.5,
            -0.2,
            0.8
        ],
        bias: 0.1
    );
    $n2 = new Neuron(
        weights: [
            -0.5,
            0.2,
            0.8
        ],
        bias: -0.1
    );

    $network = new NeuralNetwork(
        neurons: [
            $n1,
            $n2
        ]
    );

    $controller = new NNController(
        network: $network
    );

    return $controller->predict(
        request: $request,
        response: $response
    );
});


// --------------------------------------------------
// Run
// --------------------------------------------------

$app->run();
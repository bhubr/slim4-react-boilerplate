<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);
/*$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});
*/

$app->get('/[{path:[^.]*}]', function($request, $response, $path = null) {
    error_log($request->getUri()->getPath());
    // $index_path = realpath(__DIR__ . '/../build/index.html');
    $index_path = realpath(__DIR__ . '/_index.html');
    $index_file = file_get_contents($index_path);
    $response->getBody()->write($index_file);
    return $response;
});

$app->run();

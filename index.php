<?php

use Aws\Lambda\LambdaClient;

require_once __DIR__ . '/bootstrap.php';

$vars = require_once __DIR__ . '/parse-dot-env.php';

$client = new LambdaClient([
    'profile' => 'default',
    'region'  => getenv('AWS_REGION'),
    'version' => 'latest'
]);

$res = $client->updateFunctionConfiguration([
    'FunctionName' => getenv('AWS_FUNCTION_NAME'),
    'Environment' => [
        'Variables' => $vars
    ]
]);

echo json_encode($res['Environment'], JSON_PRETTY_PRINT);

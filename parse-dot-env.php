<?php

$envFile = getenv('SOURCE_ENV_PATH');

if(!file_exists($envFile)) {
    throw new RuntimeException("SOURCE_ENV_PATH is not exist! Data: $envFile");
}

$envContent = file_get_contents(getenv('SOURCE_ENV_PATH'));

$lines = array_filter(explode(PHP_EOL, $envContent), function ($row) {
    if(
        empty($row)
        || strpos($row, '=') === false
    ) {
        return false;
    }

    return true;
});

$vars = [];
foreach ($lines as $line) {
    list($k, $v) = explode('=', trim($line));
    $v = trim($v);

    $vars[$k] = $v;
}

return $vars;

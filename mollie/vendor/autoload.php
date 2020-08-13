<?php

// scoper-composer-autoload.php @generated by PhpScoper

$loader = require_once __DIR__.'/composer-autoload.php';

// Functions whitelisting. For more information see:
// https://github.com/humbug/php-scoper/blob/master/README.md#functions-whitelisting
if (!function_exists('database_read')) {
    function database_read() {
        return \_PhpScoper5d8cb17438769\database_read(...func_get_args());
    }
}
if (!function_exists('database_write')) {
    function database_write() {
        return \_PhpScoper5d8cb17438769\database_write(...func_get_args());
    }
}
if (!function_exists('printOrders')) {
    function printOrders() {
        return \_PhpScoper5d8cb17438769\printOrders(...func_get_args());
    }
}
if (!function_exists('composerRequire640f8b0c3ae2a1bf1a57eb5d80ddc720')) {
    function composerRequire640f8b0c3ae2a1bf1a57eb5d80ddc720() {
        return \_PhpScoper5d8cb17438769\composerRequire640f8b0c3ae2a1bf1a57eb5d80ddc720(...func_get_args());
    }
}
if (!function_exists('getallheaders')) {
    function getallheaders() {
        return \_PhpScoper5d8cb17438769\getallheaders(...func_get_args());
    }
}

return $loader;

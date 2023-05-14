<?php


require '../app/init.php';

// spl_autoload_register(function ($class) {
//     $class   = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//     echo dirname(__DIR__) . "/{$class}.php";
//     // exit;

//     require dirname(__DIR__) . "/{$class}.php";
// });

$router = new Router;

require APP_DIR . '/routes.php';

$uri =  parse_url($_SERVER['REQUEST_URI'])['path']; // get route without query strings

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
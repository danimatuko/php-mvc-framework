<?php

/**
 * The Router class is responsible for routing incoming requests to the appropriate action based on the URI and HTTP method.
 */
class Router {
    /**
     * An array of all the registered routes.
     *
     * @var array
     */
    private $routes = [];

    /**
     * Adds a new route to the $routes array.
     *
     * @param string $method The HTTP method for the route (GET, POST, PUT, DELETE).
     * @param string $uri The URI path for the route.
     * @param string $action The action that should handle the request (Controller method).
     */
    private function addRoute($method, $uri, $action) {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'action' => $action,
            'params' => []
        ];
    }

    /**
     * Adds a GET route to the $routes array.
     *
     * @param string $uri The URI path for the route.
     * @param string $action The action that should handle the request.
     */
    public function get($uri, $action) {
        $this->addRoute('GET', $uri, $action);
    }

    /**
     * Adds a POST route to the $routes array.
     *
     * @param string $uri The URI path for the route.
     * @param string $action The action that should handle the request.
     */
    public function post($uri, $action) {
        $this->addRoute('POST', $uri, $action);
    }

    /**
     * Adds a DELETE route to the $routes array.
     *
     * @param string $uri The URI path for the route.
     * @param string $action The action that should handle the request.
     */
    public function delete($uri, $action) {
        $this->addRoute('DELETE', $uri, $action);
    }

    /**
     * Adds a PUT route to the $routes array.
     *
     * @param string $uri The URI path for the route.
     * @param string $action The action that should handle the request.
     */
    public function put($uri, $action) {
        $this->addRoute('PUT', $uri, $action);
    }

    /**
     *
     * Matches a given URI and HTTP method to a registered route in the router's routes array.
     * @param string $uri The URI to match against the registered routes
     * @param string $method The HTTP method to match against the registered routes
     * @return array|null Returns the matched route array with any parameters or null if no match is found
     */
    public function match($uri, $method) {
        foreach ($this->routes as $route) {
            $pattern = '/^' . str_replace('/', '\/', $route['uri']) . '$/';
            $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '(?P<$1>[a-zA-Z0-9-]+)', $pattern);
            if (preg_match($pattern, $uri, $matches) && $route['method'] === strtoupper($method)) {
                $route['params'] = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                return $route;
            }
        }
        return null;
    }


    /**
     * Attempts to dispatch the request to the appropriate action.
     *
     * @param string $uri The URI to match.
     * @param string $method The HTTP method to match (GET, POST, PUT, DELETE).
     *
     * @return void
     */
    public function dispatch($uri, $method) {
        $route = $this->match($uri, $method);
        if ($route) {
            // Retrieve the action associated with the matched route
            $action = $route['action'];

            // Split the action into a controller and method name
            $parts = explode('@', $action);
            $controllerName = $parts[0];
            $methodName = $parts[1] ?? 'index';
            $params = $route['params'];

            // Load the controller file
            require CONTROLLERS_DIR . '/' . $controllerName . '.php';
            // Create a new instance of the controller class
            $controller = new $controllerName();
            call_user_func_array([$controller, $methodName], $params);
        } else {
            // If no route is found, abort the request with a 404 status code
            $this->abort(404);
        }
    }


    /**
     * Aborts the current request and returns a specified HTTP status code.
     *
     * @param int $code The HTTP status code to return (e.g. 404 for "Not Found").
     * @return void
     */
    private function abort($code) {
        http_response_code($code);
        require CONTROLLERS_DIR . "/HttpError.php";
        $controller = new HttpError();
        call_user_func_array([$controller, 'httpError'], [$code]);

        exit;
    }
}

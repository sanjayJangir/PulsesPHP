<?php

namespace App\Servcies;

class Route {
  private static $routes = [];

  public static function get($path, $controller, $action = null, $middleware = null, $namespace = null, $prefix = null, $name = null) {
    self::addRoute('GET', $path, $controller, $action, $middleware, $namespace, $prefix, $name);
  }

  public static function post($path, $controller, $action = null, $middleware = null, $namespace = null, $prefix = null, $name = null) {
    self::addRoute('POST', $path, $controller, $action, $middleware, $namespace, $prefix, $name);
  }

  private static function addRoute($method, $path, $controller, $action, $middleware = null, $namespace = null, $prefix = null, $name = null) {
    // If the controller is a string, prepend the namespace

    self::$routes[] = [
      'method' => $method,
      'path' => $path,
      'action' => !empty($action) ? $controller . '@' . $action : $controller,
      'middleware' => $middleware,
      'namespace' => $namespace,
      'prefix' => $prefix,
      'name' => $name
    ];
  }

  public static function getInstance() {
    $requestURI = $_SERVER['REQUEST_URI'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $requestURI = strtok($requestURI, '?'); // Remove query string if present

    // Normalize the request URI
    $requestURI = rtrim($requestURI, '/');
    $requestURI = $requestURI === '' ? '/' : $requestURI;

    // Iterate through the routes to find a match
    foreach (self::$routes as $route) {
      // Check if the request method and path match the route
      if ($route['method'] === $requestMethod && $route['path'] === $requestURI) {
        $action = explode('@', $route['action']);
        $controllerName = $action[0];
        $methodName = $action[1];
        if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
          $controller = new $controllerName();
          return call_user_func([$controller, $methodName]);
        }
      }
    }

    // Handle 404 Not Found
    http_response_code(404);
    echo "404 Not Found";
    exit;
  }

  public function getRoutes() {
    return $this->routes;
  }
}

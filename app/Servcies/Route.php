<?php

namespace App\Servcies;

class Route {
  private static $routes = [];

  private static $controllerNamespace = 'App\Controllers\\';

  public static function get($path, $action, $middleware = null, $namespace = null, $prefix = null, $name = null) {
    self::addRoute('GET', $path, $action, $middleware, $namespace, $prefix, $name);
  }

  public static function post($path, $action, $middleware = null, $namespace = null, $prefix = null, $name = null) {
    self::addRoute('POST', $path, $action, $middleware, $namespace, $prefix, $name);
  }

  private static function addRoute($method, $path, $action, $middleware = null, $namespace = null, $prefix = null, $name = null) {
    self::$routes[] = [
      'method' => $method,
      'path' => $path,
      'action' => self::$controllerNamespace . $action,
      'middleware' => $middleware,
      'namespace' => $namespace,
      'prefix' => $prefix,
      'name' => $name
    ];
  }

  public static function getInstance() {
    $requestURI = $_SERVER['REQUEST_URI'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    foreach (self::$routes as $route) {
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

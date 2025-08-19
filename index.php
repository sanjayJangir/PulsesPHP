<?php
define('APP_ROOT', __DIR__);
define('CONFIG_ROOT', APP_ROOT . '/app/Config');

// Load the application configuration
require_once CONFIG_ROOT . '/AppConfig.php';

// Include the autoloader for classes
require_once APP_ROOT . '/vendor/autoload.php';

// Autoload classes using PSR-4 standard
spl_autoload_register(function ($class) {
  $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $class . 'php');
  $classFile = str_replace('App\\', '', $classFile); // Remove App namespace prefix
  $classFile = str_replace('Servcies', 'Services', $classFile); // Correct the typo in Services namespace
  $classFile = str_replace('Model', 'Models', $classFile); // Correct the typo in Models namespace
  $classFile = str_replace('Controllers', 'Controllers', $classFile); // Ensure Controllers namespace is correct
  $classPath = APP_ROOT . '/' . $classFile;
  echo "Loading class: $classPath\n"; // Debugging line to see which class is being loaded

  die;
  if (file_exists($classPath)) {
    require_once $classPath;
  } else {
    throw new \Exception("Class file not found: " . $classPath);
  }
});

// Start the session
session_start();

// Load the routes
use App\Servcies\Route;

$routes = new Route();
require_once APP_ROOT . '/routes/route.php';
$routes->getInstance();

<?php

define('APP_ROOT', __DIR__);
define('CONFIG_ROOT', APP_ROOT . '/app/config');

// Load the application configuration
require_once CONFIG_ROOT . '/app_config.php';

// Start the session
session_start();

// Include the autoloader for classes
require_once APP_ROOT . '/vendor/autoload.php';

// Autoload classes using PSR-4 standard
spl_autoload_register(function ($class) {
  $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $class . 'php');
  $classPath = APP_ROOT . '/' . $classFile;

  if (file_exists($classPath)) {
    require_once $classPath;
  } else {
    throw new \Exception("Class file not found: " . $classPath);
  }
});

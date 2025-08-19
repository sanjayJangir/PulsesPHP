<?php

/*
  name: Application Configuration
  description: This file contains the application configuration settings.
  It is used to define constants for various directories and includes necessary files.
  version: 1.0
  author: Sanjay Kumar
  email:sk857065@gmail.com
  date: 2023-10-01
*/

namespace App\Config;

class AppConfig {
  public static function init() {
    // define('APP_ROOT', dirname(__DIR__));
    define('PUBLIC_ROOT', APP_ROOT . '/public');
    // define('CONFIG_ROOT', APP_ROOT . '/config');
    define('VIEWS_ROOT', APP_ROOT . '/views');
    define('CONTROLLERS_ROOT', APP_ROOT . '/controllers');
    define('MODELS_ROOT', APP_ROOT . '/models');
    define('ASSETS_ROOT', PUBLIC_ROOT . '/assets');

    // Load the application configuration
    require_once CONFIG_ROOT . '/Database.php';
  }
}

// This file is used to initialize the application configuration.
// It should be included at the start of your application to set up necessary constants and include required files.
// Make sure to call AppConfig::init() in your entry point file (e.g., index.php).
AppConfig::init();

<?php
/*
  name: Database Configuration
  description: this file contains the routes for the application.
  It defines the URL patterns and their corresponding controller actions.
  version: 1.0
  author: Sanjay Kumar
  email:sk857065@gmail.com
  date: 2023-10-01
*/

namespace App\Config;

class Routes {
  public static function getRoutes() {
    return [
      '/' => 'HomeController@index',
      '/about' => 'AboutController@index',
      '/contact' => 'ContactController@index',
      // Add more routes as needed
    ];
  }
}

// This file is used to define the application's routes.
// It should not be modified unless you need to change the routing logic.
// Make sure to include this file in your application where routing is handled.
// This file is essential for the application's URL routing functionality.

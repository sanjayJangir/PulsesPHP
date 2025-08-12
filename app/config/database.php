<?php
/*
  name: Database Configuration
  description: This file contains the database connection settings for the application.
  It is used to establish a connection to the database using PDO.
  version: 1.0
  author: Sanjay Kumar
  email:sk857065@gmail.com
  date: 2023-10-01
*/

namespace App\Config;

class Database {
  public static function getConnection() {
    // Database connection logic here
    // For example, using PDO to connect to a MySQL database
    $host = '127.0.0.1';
    $db = 'custom_ci4_db';
    $user = 'root';
    $pass = 'password';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
      \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
      \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
      return new \PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {

      throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
  }
}

Database::getConnection(); // Call this method to get the database connection instance


// This file is used to set up the database connection for the application.
// It should not be modified unless you need to change the database credentials or settings.
// Make sure to include this file in your application where the database connection is needed.
// This file is essential for the application's database operations.

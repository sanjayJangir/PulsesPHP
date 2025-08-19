<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Servcies\View;

class LoginController extends Controller {

  public function index() {
    // Logic for displaying the login form
    echo View::make(APP_ROOT . '/Views')
      ->render('home', [
        'title' => 'Login Page',
        'name'  => 'Sanjay',
      ]);
  }

  public function authenticate() {
    // Logic for authenticating the user
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'] ?? '';
      $password = $_POST['password'] ?? '';

      // Here you would typically check the credentials against a database
      if ($username === 'admin' && $password === 'password') {
        // Set session variables or redirect to a dashboard
        $_SESSION['user'] = $username;
        header('Location: /dashboard');
      } else {
        echo "Invalid credentials";
      }
    }
  }
}

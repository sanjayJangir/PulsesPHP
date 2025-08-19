<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;

class DashboardController extends Controller {

  public function index() {
    // Logic for displaying the dashboard
    $data = [
      'title' => 'Admin Dashboard',
      'content' => 'Welcome to the admin dashboard!'
    ];

    print_r($data); // Debugging line to check data
    die;

    $this->render('dashboard', $data);
  }
}

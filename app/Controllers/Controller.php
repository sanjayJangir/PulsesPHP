<?php

namespace App\Controllers;

class Controller {
  // Base controller logic can be defined here
  protected function render($view, $data = []) {
    // Logic to render a view with data
    extract($data);
    include __DIR__ . '/../views/' . $view . '.php';
  }
}

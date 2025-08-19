<?php

namespace App\Helpers;

use App\Servcies\View;

/**
 * Helper function to format dates.
 *
 * @param string $date Date string to format.
 * @param string $format Format to apply.
 * @return string Formatted date.
 */
function formatDate(string $date, string $format = 'Y-m-d H:i:s'): string {
  $dateTime = new \DateTime($date);
  return $dateTime->format($format);
}

/**
 * Helper function to render a view.
 *
 * @param string $view View name to render.
 * @param array $data Data to pass to the view.
 * @return string Rendered view content.
 */

function view(string $view, array $data = []): string {
  static $engine = null;
  if ($engine === null) {
    $engine = new View(__DIR__ . '/../views');
  }
  return $engine->render($view, $data);
}

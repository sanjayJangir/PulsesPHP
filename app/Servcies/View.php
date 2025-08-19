<?php

namespace App\Servcies;

use RuntimeException;

class View {
  protected string $viewsPath;
  protected array $data = [];
  protected ?string $layout = null;
  protected array $sections = [];
  protected array $sectionStack = [];

  public function __construct(string $viewsPath) {
    $this->viewsPath = rtrim($viewsPath, '/');
  }

  public static function make(string $viewsPath): self {
    return new self($viewsPath);
  }

  public function render(string $view, array $data = []): string {
    $this->data = $data;
    $content = $this->include($view);

    if ($this->layout) {
      // make child content available to the layout as $_content
      $content = $this->include(
        $this->layout,
        array_merge($data, ['_content' => $content])
      );
      $this->layout = null; // reset for next render
    }

    return $content;
  }

  protected function include(string $view, ?array $dataOverride = null): string {
    $file = $this->viewsPath . '/' . str_replace('.', '/', $view) . '.php';
    if (!is_file($file)) {
      throw new RuntimeException("View not found: {$file}");
    }

    $data = $dataOverride ?? $this->data;
    extract($data, EXTR_SKIP);
    $view = $this; // expose $view helper inside templates

    ob_start();
    include $file;
    return ob_get_clean();
  }

  // --- Layouts & sections ---
  public function extend(string $layout): void {
    $this->layout = $layout;
  }

  public function start(string $name): void {
    $this->sectionStack[] = $name;
    ob_start();
  }

  public function end(): void {
    $name = array_pop($this->sectionStack);
    $this->sections[$name] = trim(ob_get_clean());
  }

  public function section(string $name, string $default = ''): void {
    echo $this->sections[$name] ?? $default;
  }

  // --- Partials ---
  public function includePartial(string $view, array $data = []): void {
    echo $this->include($view, array_merge($this->data, $data));
  }

  // --- Escaping helper like Blade's {{ }} ---
  public function e(?string $value): string {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
  }
}

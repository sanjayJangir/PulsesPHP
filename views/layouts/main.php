<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $view->e($title ?? 'My App') ?></title>
  <style>
    body {
      font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
      margin: 0;
    }

    .container {
      max-width: 900px;
      margin: 2rem auto;
      padding: 0 1rem;
    }

    header,
    footer {
      background: #f6f6f6;
      padding: 1rem;
    }

    nav a {
      margin-right: .75rem;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <header>
    <?php $view->includePartial('partials/nav'); ?>
  </header>


  <main class="container">
    <?php $view->section('content'); ?>
  </main>


  <footer class="container">
    <small>&copy; <?= date('Y') ?> My App</small>
    <?php $view->section('scripts'); ?>
  </footer>
</body>

</html>

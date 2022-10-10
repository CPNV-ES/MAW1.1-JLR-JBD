<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? "Sans titre" ?></title>
    <link href="/css/view.css" rel="stylesheet">
  </head>
  <body>
    <header class="heading managing">
      <section class="container">
        <a href="/"><img src="/images/logo.png"></a>
        <span class="exercise-label"><?= $titleLayout?></span>
      </section>
    </header>
    <main class="container">
      <?= $content ?>
    </main>
    <script src="/js/test.js"></script>
  </body>
</html>

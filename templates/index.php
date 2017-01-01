<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title><?= $config->site_title() ?></title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1><a href="./"><?= $config->site_title() ?></a></h1>
      </div>
      <div class="body">
        <div class="row">
        <?php
          shuffle($pages);
          $index = 0;

          foreach ($pages as $page) :
          if ($page->path() == "index") continue;

          $rowEnd = $index++ % 3 == 2;
        ?>
          <div class="cards">
            <a href="<?= $page->path() ?>">
              <h2><?= $page->metadata()["title"] ?></h2>
              <?= mb_substr($page->content(), 0, 150) ?>
              <?= mb_strlen($page->content()) > 150 ? "..." : "" ?>
            </a>
          </div>
        <?php if ($rowEnd): ?>
          </div>
          <div class="row">
        <?php endif; ?>
        <?php endforeach; ?>
        </div>
      </div>
      <div class="footer">
        <a href="http://kentarok.org">Kentaro Kuribayashi</a>.
      </div>
    </div>
  </body>
</html>

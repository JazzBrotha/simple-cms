<?php

require '../app/start.php';

$pages = $pdo->query("
  SELECT id, label, title, slug
  FROM pages
  ORDER BY created DESC
")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/user/list.php';

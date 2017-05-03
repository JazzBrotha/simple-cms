<?php
require 'app/start.php';

$pages = $pdo->query("
  SELECT id, label, slug
  FROM pages
")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/home.php';
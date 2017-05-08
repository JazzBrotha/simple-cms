<?php

//Before output: Makes sure text is not interpreted as HTML
function escape($text) {
  return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function sortByDate($a, $b ) {
    return strtotime($b["created"]) - strtotime($a["created"]);
}

//After input: Makes sure no hostile scripts are stored in db
function noScript($text) {
  require_once 'libs/htmlpurifier-4.9.2-standalone/HTMLPurifier.standalone.php';
  $config = HTMLPurifier_Config::createDefault();
  $purifier = new HTMLPurifier($config);
  $clean = $purifier->purify($text);
  return $clean;
}

?>

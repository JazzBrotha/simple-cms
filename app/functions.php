<?php

function escape($text) {
  return htmlspecialchars($text, ENT_HTML5, 'UTF-8');
}

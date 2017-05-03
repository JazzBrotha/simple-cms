<?php

require "password.php";

$options = [	
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false
    ];

$pdo = new PDO(
    "mysql:host=johnny.heliohost.org;dbname=phpgrupp_cms;charset=utf8",
    "phpgrupp",
    $password, 
    $options
    );

?>
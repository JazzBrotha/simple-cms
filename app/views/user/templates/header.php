<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL?>/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL?>/assets/css/main.css">
    <title>Front End Blog</title>
</head>
<body>
  <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-black">
    <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/index.php">&#171; BACK TO BLOG</a>
        </li>
      </ul>
        <a class="navbar-brand" href="#">
           <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
           Welcome,   
           <?php
           if ($_SESSION["loggedin"]) {
              echo $_SESSION["username"]; 
              if ($_SESSION['is_admin']) {
                echo ' (admin)';
              };
           }

          else {
            echo "Guest";
          }
           ?>
          
         </a>
    </div>
  </nav>

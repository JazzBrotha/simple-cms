<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/simple-cms">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Front End Blog <?php if (isset($headTitle)) echo '- ' . $headTitle ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL?>/assets/css/clean-blog.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL?>/assets/css/main.css">
    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
.navbar-toggler {
    z-index: 1;
}

@media (max-width: 576px) {
    nav > .container {
        width: 100%;
    }
}
</style>
</head>
<body>
  <nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
            </button>
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>/index.php"> <i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/public/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/public/contact.php">Contact</a>
                    </li>
                    <?php if ($_SESSION['loggedin']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . '/user/list.php'?>">Admin panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link thin" href="<?php echo BASE_URL . '/public/user.php?user_id=' . $_SESSION['user_id'];?>">Logged in as <?php echo $_SESSION['username']?>
                        <?php if ($_SESSION['is_admin']): ?>
                        (admin)
                        <?php endif; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/public/logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/public/login.php"> Login <i class="fa fa-sign-in" aria-hidden="true"></i> </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

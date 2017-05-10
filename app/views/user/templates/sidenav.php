<div class="container-fluid">
  <div class="row">
    <nav class="col-sm-3 col-md-2 hidden-xs-down bg-inverse sidebar">
      <ul class="nav flex-column">
                <?php
        if ($_SESSION['is_admin']): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/user/admin_list.php">VIEW ALL POSTS</a>
        </li>
        <div class="dropdown-divider"></div>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo BASE_URL; ?>/user/list.php">VIEW YOUR POSTS<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/user/add.php">CREATE POST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/user/edit_user.php">EDIT YOUR PROFILE</a>
        </li>
      <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/public/logout.php">LOG OUT</a>
        </li>
      </ul>
    </nav>

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">

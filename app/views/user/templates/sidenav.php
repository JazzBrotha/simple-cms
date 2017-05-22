<div id="wrapper" class="toggled">

  <!-- Sidebar -->
  <div id="sidebar-wrapper">
    <ul class="sidebar-nav d-flex align-items-stretch flex-column full-height">
      <div class="first p-3">
      <li class="sidebar-brand text-white">
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


      </li>
                <div class="profile-pic-container-mini mr-auto ml-auto">
            <img class="profile-pic-mini" src="<?php if ($user['picture']) {
                            echo $user['picture'];
                            } else echo BASE_URL . '/assets/img/mona-lisa.jpg' ?>" alt="user-profilepic">
          </div>
          </div>
          <div class="second">
      <?php
        if ($_SESSION['is_admin']): ?>
        <li class="nav-item">
          <a class="nav-link <?php if($currentPage === 'admin_list.php') echo 'active-page'?>" href="<?php echo BASE_URL; ?>/user/admin_list.php">VIEW ALL POSTS <i class="fa fa-folder-o" aria-hidden="true"></i>
</a>
        </li>
        <div class="dropdown-divider"></div>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link <?php if($currentPage === 'list.php') echo 'active-page'?>" href="<?php echo BASE_URL; ?>/user/list.php">VIEW YOUR POSTS <i class="fa fa-folder-open-o" aria-hidden="true"></i>
<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($currentPage === 'add.php') echo 'active-page'?>" href="<?php echo BASE_URL; ?>/user/add.php">CREATE POST <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($currentPage === 'edit_user.php') echo 'active-page'?>" href="<?php echo BASE_URL; ?>/user/edit_user.php">EDIT YOUR PROFILE <i class="fa fa-user" aria-hidden="true"></i>
</a>
        </li>
        </div>
        <div class="third mt-auto">
        <li>
          <a class="nav-link" href="<?php echo BASE_URL; ?>/index.php">&#171; BACK TO BLOG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/public/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOG OUT</a>
        </li>
        </div>
    </ul>
  </div>
    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
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
           <div class="profile-pic-container">
                        <img class="profile-pic" src="<?php if ($user['picture']) {
                            echo $user['picture'];
                            } else echo BASE_URL . '/assets/img/mona-lisa.jpg' ?>" alt="user-profilepic">
          </div>
        </li>
          <?php
        if ($_SESSION['is_admin']): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/user/admin_list.php">VIEW ALL POSTS</a>
        </li>
        <div class="dropdown-divider"></div>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/user/list.php">VIEW YOUR POSTS<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/user/add.php">CREATE POST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/user/edit_user.php">EDIT YOUR PROFILE</a>
        </li>
          <li>
            <a class="nav-link back-blog" href="<?php echo BASE_URL; ?>/index.php">&#171; BACK TO BLOG</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/public/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOG OUT</a>
        </li>
            </ul>
        </div>



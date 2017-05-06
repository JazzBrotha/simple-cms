<div class="container-fluid">
  <div class="row">
    <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/user/edit_user.php?user_id=<?php echo $userId; ?>">My account details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/user/list.php">My posts</a>
        </li>
      </ul>
    </nav>

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">

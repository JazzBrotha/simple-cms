<?php require VIEW_ROOT . '/user/templates/header.php'; ?>
<?php require VIEW_ROOT . '/user/templates/sidenav.php'; ?>

<div id="page-content-wrapper">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">

<div class="container">

  <?php if(isset($_GET['success'])): ?>
      <div class="alert alert-success" role="alert">User was successfully <?php echo $_GET['success'] . '!'; ?></div>
  <?php endif ?>
  <?php if (isset($_GET['access'])): ?>
      <div class="alert alert-danger" role="alert">Acess was <?php echo $_GET['access'] . '.';?></div>
  <?php endif ?>

  <h2>All users</h2>
  <?php if (empty($allUsers)): ?>
    <p>No users at the moment.</p>
  <?php else: ?>
    <table class="table table-responsive table-hover">
      <thead>
        <tr>
          <th>Username</th>
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($allUsers as $user): ?>
          <?php if(!$user['is_admin']): ?>
          <tr>
            <td><a href="<?php echo BASE_URL . '/public/user.php?user_id=' . $user['user_id'];?>"><?php echo escape($user['username']); ?></a></td>
            <td><?php echo escape($user['firstname']); ?></td>
            <td><?php echo escape($user['lastname']); ?></td>
            <td><?php echo escape($user['email']); ?></td>
            <td><button class="btn btn-danger delete-btn pointer" data-name="<?php echo $user['username'];?>" data-link="<?php echo BASE_URL . '/user/delete_user.php?user_id=' . $user['user_id'] . '&admin=true'; ?>">Delete</button></td>
          </tr>
          <?php endif ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-arrows-h" aria-hidden="true"></i> Toggle</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>


<!--script for sweet-alert popups on delete-->
<script src="<?php echo BASE_URL?>/assets/js/delete-alerts.js"></script>

<?php require VIEW_ROOT . '/user/templates/footer.php'; ?>

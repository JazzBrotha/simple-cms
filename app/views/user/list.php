<?php require VIEW_ROOT . '/user/templates/header.php'; ?>
<?php require VIEW_ROOT . '/user/templates/sidenav.php'; ?>

<div class="container">

  <?php if(isset($_GET['success'])): ?>
      <div class="alert alert-success" role="alert">Post was successfully <?php echo $_GET['success'] . '!'; ?></div>
  <?php endif ?>
  <?php if (isset($_GET['access'])): ?>
      <div class="alert alert-danger" role="alert">Acess was <?php echo $_GET['access'] . '.';?></div>
  <?php endif ?>

  <h2>Your posts</h2>
  <?php if (empty($userPosts)): ?>
    <p>No posts at the moment.</p>
  <?php else: ?>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Title</th>
          <th>Created</th>
          <th>Updated</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($userPosts as $post): ?>
          <tr>
            <td><a href="<?php echo BASE_URL; ?>/page.php?post_id=<?php echo $post['post_id']; ?>"><?php echo escape($post['title']); ?></a></td>
            <td><?php echo $post['created']; ?></td>
            <td><?php if (isset($post['updated'])) echo $post['updated']; ?></td>
            <td><a class="btn btn-info" role="button" href="<?php echo BASE_URL; ?>/user/edit.php?post_id=<?php echo $post['post_id']; ?>">Edit</a></td>
            <td><button class="btn btn-info delete-btn pointer" data-name="<?php echo $post['title'];?>" data-link="<?php echo BASE_URL . '/user/delete.php?post_id=' . $post['post_id']; ?>">Delete</button></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
<!--script for sweet-alert popups on delete-->
<script src="<?php echo BASE_URL?>/assets/js/delete-alerts.js"></script>

<?php require VIEW_ROOT . '/user/templates/footer.php'; ?>

<?php require VIEW_ROOT . '/user/templates/header.php'; ?>
<?php require VIEW_ROOT . '/user/templates/sidenav.php'; ?>

  <h2>Your posts</h2>
  <?php if (empty($pages)): ?>
    <p>No posts at the moment.</p>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>Post id</th>
          <th>Created</th>
          <th>Title</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pages as $page): ?>
          <tr>
            <td><?php echo escape($page['post_id']); ?></td>
            <td><?php echo escape($page['created']); ?></td>
            <td><a href="<?php echo BASE_URL; ?>/page.php?post=<?php echo escape($page['post_id']); ?>"><?php echo escape($page['title']); ?></a></td>
            <td><a href="<?php echo BASE_URL; ?>/user/edit.php?post_id=<?php echo escape($page['post_id']); ?>">Edit</a></td>
            <td><a href="<?php echo BASE_URL; ?>/user/delete.php?post_id=<?php echo escape($page['post_id']); ?>">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

<a href="<?php echo BASE_URL; ?>/user/add.php">Add page</a>

<?php require VIEW_ROOT . '/user/templates/footer.php'; ?>

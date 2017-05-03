<?php require VIEW_ROOT . '/templates/header.php'; ?>

  <h2>Your posts</h2>
  <?php if (empty($pages)): ?>
    <p>No posts at the moment.</p>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>Label</th>
          <th>Title</th>
          <th>Slug</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pages as $page): ?>
          <tr>
            <td><?php echo escape($page['label']); ?></td>
            <td><?php echo escape($page['title']); ?></td>
            <td><a href="<?php echo BASE_URL; ?>/page.php?page=<?php echo escape($page['slug']); ?>"><?php echo escape($page['slug']); ?></a></td>
            <td><a href="<?php echo BASE_URL; ?>/user/edit.php?id=<?php echo escape($page['id']); ?>">Edit</a></td>
            <td><a href="<?php echo BASE_URL; ?>/user/delete.php?id=<?php echo escape($page['id']); ?>">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

<a href="<?php echo BASE_URL; ?>/user/add.php">Add page</a>

<?php require VIEW_ROOT . '/templates/footer.php'; ?>

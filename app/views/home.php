<?php require VIEW_ROOT . '/templates/header.php'; ?>

<h1>Front End Blog</h1>

  <?php if (empty($pages)): ?>
    <p>Sorry, no posts at the moment</p>
  <?php else: ?>
    <ul>
      <?php foreach ($pages as $page): ?>
        <li><a href="<?php echo BASE_URL; ?>/page.php?post=<?php echo $page['post_id']; ?>">
      <?php echo $page['title']; ?></a></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <a href="<?php echo BASE_URL; ?>/public/login.php">Login</a>

<?php require VIEW_ROOT . '/templates/footer.php'; ?>

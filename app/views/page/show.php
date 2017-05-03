<?php require VIEW_ROOT . '/public/templates/header.php';
?>

  <?php if (!$page) { ?>
    <p>No post found, sorry.</p>

  <?php } else { ?>
    <h2><?php echo escape($page['title']); ?></h2>
    <?php echo escape($page['body']); ?>

    <p>Created on <?php echo $page['created']->format('jS M Y'); ?>
      <?php if ($page['updated'] !== null) { ?>
      Last updated on <?php echo $page['updated']->format('jS M Y h:i a'); ?></p>
    <?php } ?>
    <?php } ?>


<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>

<?php require VIEW_ROOT . '/public/templates/header.php';?>
<header class="masthead" style="background-image:url(<?php echo BASE_URL; ?>/assets/img/post-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="post-heading">
                  <?php if (!$page) { ?>
                    <h1>No post found, sorry.</h1>
                  <?php } else { ?>
                    <h1><?php echo escape($page['title']); ?></h1>
                  <?php foreach (explode(',',$page['tags']) as $tag): ?>
                    <span class="badge badge-pill badge-default"><?php echo $tag; ?></span>
                  <?php endforeach; ?>
                  <div class="mt-3">
                    <span class="meta"><span class="border-right border-white"><?php echo $page['likes']?> likes </span>
                    
                    <?php if ($page['user_liked']):?>
                    <a href="<?php echo BASE_URL . '/user/like.php?post_id=' . $page['post_id'] . '&action=unlike'; ?>">Unlike</a></span>
                    <?php else: ?>
                    <a href="<?php echo BASE_URL . '/user/like.php?post_id=' . $page['post_id'] . '&action=like'; ?>">Like</a></span>
                    <?php endif; ?> 
                    
                    <span class="meta">Posted by <a href=""><?php echo $page['user_id'] ?></a> 
                    on <?php echo $page['created']->format('jS M Y'); ?></span>
                  </div>
                  <?php if ($page['updated'] !== null) { ?>
                  <span class="meta">Last updated on <?php echo $page['updated']->format('jS M Y h:i a'); ?></span>
                  <?php } ?>
                  <?php } ?>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
      <?php echo $page['body']; ?></div>
          </div>
      </div>
  </article>

   <hr>
<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>

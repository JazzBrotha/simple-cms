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
                    <h2 class="subheading">Summary</h2>
                  <span class="meta">Posted by <a href=""><?php echo $page['user_id']; ?></a> on <?php echo $page['created']->format('jS M Y'); ?></span>
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

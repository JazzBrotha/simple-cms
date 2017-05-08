<?php require VIEW_ROOT . '/public/templates/header.php'; ?>

<header class="masthead" style="background-image:url(<?php echo BASE_URL; ?>/assets/img/home-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="site-heading">
                        <h1>Front End Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<div class="container">
 <div class="row">

<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">

  <?php if (empty($pages)): ?>
    <p>Sorry, no posts at the moment</p>

  <?php else: ?>
      <?php foreach ($pages as $page): ?>
        <div class="post-preview">
          <a href="<?php echo BASE_URL; ?>/page.php?post_id=<?php echo $page['post_id']; ?>">
            <h2 class="post-title"><?php echo escape($page['title']); ?></h2>
            <h3 class="post-subtitle">Summary</h3>
          </a>
          <p class="post-meta"><?php echo Likes::count_likes($page['post_id']); ?> Likes | Posted by <a href=""><?php echo $page['user_id']; ?></a> on <?php echo $page['created']; ?></p>
          <?php foreach (explode(',',$page['tags']) as $tag): ?>
          <span class="badge badge-pill badge-default"><?php echo $tag; ?></span>
          <?php endforeach; ?>
        </div><!-- /.blog-post -->
         <hr>
      <?php endforeach; ?>
  <?php endif; ?>

  <div class="clearfix">
                    <a class="btn btn-secondary float-right" href="#">Older Posts &rarr;</a>
                </div>

</div><!-- /.blog-main -->
 <hr>

</div><!-- /.row -->

</div><!-- /.container -->
<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>

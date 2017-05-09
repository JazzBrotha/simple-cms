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
    <h1>No posts at the moment</h1>
  <?php else: ?>
      <?php foreach ($pagesSplit[0] as $page): ?>
        <?php
              $plainTextBody = strip_tags($page['body']);
              $summary = substr($plainTextBody, 0, 50);
              $user->bindParam(':id', $page['user_id']);
              $user->execute();
              $userName = $user->fetch(PDO::FETCH_ASSOC);
              $likes->bindParam(':post_id', $page['post_id']);
              $likes->execute();
              $result = $likes->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="post-preview" id="posts">
          <a href="<?php echo BASE_URL; ?>/page.php?post_id=<?php echo $page['post_id']; ?>">
            <h2 class="post-title"><?php echo escape($page['title']); ?></h2>
            <h3 class="post-subtitle"><?php echo $summary ?>...</h3>
          </a>
          <p class="post-meta"><span class="border-right"><?php echo $result['COUNT(*)']; ?> Likes </span>
            Posted by <a href=""><?php echo $userName['username']; ?></a> on <?php echo $page['created']; ?></p>
          <?php foreach (explode(',',$page['tags']) as $tag): ?>
          <span class="badge badge-pill badge-default"><?php echo $tag; ?></span>
          <?php endforeach; ?>
        </div><!-- /.blog-post -->
         <hr>
      <?php endforeach; ?>
  <?php endif; ?>

  <div class="clearfix">
      <a class="btn btn-secondary float-right" id="older-posts" onclick="getSummary(posts)">Older Posts &rarr;</a>
  </div>

</div><!-- /.blog-main -->
 <hr>

</div><!-- /.row -->

</div><!-- /.container -->
<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>

<?php require VIEW_ROOT . '/public/templates/header.php';?>
<header class="masthead" style="background-image:url(<?php echo BASE_URL; ?>/assets/img/post-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-2 col-md-12 offset-md-1">
                <div class="d-flex justify-content-between align-items-center">
                    <?php if (!$user) { ?>
                    <h1>No user found, sorry.</h1>
                    <?php } else { ?>
                    <!--print name, occupation, presentation, member since-->
                    <div class="post-heading">
                        <div>
                            <h1>
                                <?php echo escape($user['firstname'] . ' ' . $user['lastname']); ?>
                            </h1>
                            <span class="subheading"><?php echo escape($user['profession']); ?></span>
                        </div>
                        <div class="mt-3">
                            <span class="meta"><?php echo escape($user['description']);?></span>
                        </div>
                        <div class="mt-3">
                            <span class="meta">Member since <?php echo $user['created']; ?></span>
                        </div>
                    </div>
                    <div class="profile-pic-container">
                        <img class="profile-pic" src="<?php if ($user['picture']) {
                            echo $user['picture'];
                            } else echo BASE_URL . '/assets/img/mona-lisa.jpg' ?>" alt="user-profilepic">
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</header>

<!--PAGE-->

<div class="container">
 <div class="row">
   <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 flex-center">
   <div id="loader"></div>
 </div>
<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1" id="posts-container">

  <?php if (empty($posts)): ?>
    <h1>No posts at the moment</h1>
  <?php else: ?>
      <?php foreach ($posts as $post): ?>
        <?php
              $plainTextBody = strip_tags($post['body']);
              $summary = substr($plainTextBody, 0, 50);
        ?>

        <div class="post-preview">
            <!--print title-->
          <a href="<?php echo BASE_URL; ?>/page.php?post_id=<?php echo $post['post_id']; ?>">
            <h2 class="post-title"><?php echo escape($post['title']); ?></h2>
            <!--print summary-->
            <h3 class="post-subtitle"><?php echo $summary ?>...</h3>
          </a>
          <!--print likes-->
          <p class="post-meta"><span class="border-right"><?php echo $LIKES->count_likes($post['post_id']); ?> Likes </span>
          <!--print author-->
          Posted by <a href="<?php echo BASE_URL . '/public/user.php?user_id=' . $post['user_id'];?>">
          <?php echo $user['firstname'] . " " . $user['lastname']; ?></a>
          <!--print dates-->
          on <?php echo $post['created']; ?></p>
          <!--print tags-->
          <?php foreach (explode(',',$post['tags']) as $tag): ?>
          <span class="badge badge-pill badge-default"><?php echo $tag; ?></span>
          <?php endforeach; ?>
        </div><!-- /.blog-post -->
         <hr>
      <?php endforeach; ?>
  <?php endif; ?>

  <!--<div class="clearfix" id="page-navigation">
      <a class="btn btn-secondary float-right pointer" id="older-posts">Older Posts &rarr;</a>
  </div>-->

</div><!-- /.blog-main -->
 <hr>

</div><!-- /.row -->

</div><!-- /.container -->
<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>

<?php require VIEW_ROOT . '/public/templates/header.php'; ?>

<header class="masthead" style="background-image:url(<?php echo BASE_URL; ?>/assets/img/home-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="site-heading">
                        <h1>Front End Blog</h1>
                        <span class="subheading">A Blog About Front End</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 flex-center">
            <div id="loader"></div>
        </div>
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1" id="posts-container">

            <?php if (empty($pages)): ?>
            <h1>No posts at the moment</h1>
            <?php else: ?>
            <?php foreach ($pages as $page): ?>
            <?php
              $plainTextBody = strip_tags($page['body']);
              $summary = substr($plainTextBody, 0, 50);?>

                <div class="post-preview">
                    <!--print title-->
                    <a href="<?php echo BASE_URL; ?>/page.php?post_id=<?php echo $page['post_id']; ?>">
                        <h2 class="post-title">
                            <?php echo escape($page['title']); ?>
                        </h2>
                        <!--print summary-->
                        <h3 class="post-subtitle">
                        <?php echo $summary ?>...</h3>
                    </a>
                    <!--print likes-->
                    <p class="post-meta"><span class="border-right">
                    <?php
                        $likeCount->execute([':postId' => $page['post_id']]);
                        $res = $likeCount->fetch(PDO::FETCH_ASSOC);
                        echo $res['COUNT(*)'];
                    ?> Likes </span>
                        <!--print author-->
                        Posted by
                        <a href="<?php echo BASE_URL . '/public/user.php?user_id=' . $page['user_id'];?>">
                        <?php echo $page['firstname'] . " " . $page['lastname']; ?>
                        </a>
                        <!--print dates-->
                        on
                        <?php $page['created'] = new DateTime($page['created']);
                        echo $page['created']->format('M jS Y'); ?>
                    </p>
                    <!--print tags-->
                    <?php foreach (explode(',',$page['tags']) as $tag): ?>
                    <span class="badge badge-pill badge-default"><?php echo $tag; ?></span>
                    <?php endforeach; ?>
                </div>
                <!-- /.blog-post -->
                <hr>
                <?php endforeach; ?>
                <?php endif; ?>

                <div class="clearfix" id="page-navigation">
                    <a class="btn btn-secondary float-right pointer" id="older-posts">Older Posts &rarr;</a>
                </div>
        </div>
        <!-- /.blog-main -->
        <hr>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>
<?php require VIEW_ROOT . '/public/templates/header.php';?>
<header class="masthead" style="background-image:url(<?php echo BASE_URL; ?>/assets/img/post-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="post-heading">
                    <?php if (!$page) { ?>
                    <h1>No post found, sorry.</h1>
                    <?php } else { ?>

                    <!--print title-->
                    <h1>
                        <?php echo escape($page['title']); ?>
                    </h1>
                    <!--print author-->
                    <div class="mt-3">
                        <span class="meta">Posted by <a href="<?php echo BASE_URL . '/public/user.php?user_id=' . $page['user_id'];?>">
                    <?php echo $page['firstname'] . " " . $page['lastname'] ?></a> 

                    <!--print dates-->
                    on <?php echo $page['created']->format('M jS Y'); ?></span>
                    </div>
                    <?php if ($page['updated'] !== null) { ?>
                    <span class="meta">Last updated on <?php echo $page['updated']->format('jS M Y h:i a'); ?></span>
                    <?php } ?>

                    <!--print tags-->
                    <div class="mt-4">
                        <?php foreach (explode(',',$page['tags']) as $tag): ?>
                        <a href="<?php echo BASE_URL . '/public/tag.php?tag=' . $tag?>" class="badge badge-pill badge-default">
                            <?php echo $tag; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>

                    <!--print likes-->
                    <div class="mt-2">
                        <span class="meta"><span class="border-right border-white"><i class="fa fa-heart-o" aria-hidden="true"></i>
                            <span id="like-count"><?php echo $page['likes']?></span></span>
                        <?php if ($page['user_liked']):?>
                        <a href="#" class="likebtn like-toggles" data-post="<?php echo $page['post_id']?>" data-action="unlike">Unlike</a>
                        <?php else: ?>
                        <a href="#" class="likebtn like-toggles" data-post="<?php echo $page['post_id']?>" data-action="like">Like</a>
                        <?php endif; ?>
                        <!--loading spinner-->
                        <i class="fa fa-refresh fa-spin fa-md fa-fw like-toggles hidden"></i>
                        <span class="sr-only">Loading...</span></span>
                    </div>
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
                <?php echo $page['body']; ?>
            </div>
        </div>
    </div>
</article>
<hr>
<script src="<?php echo BASE_URL?>/assets/js/ajax-like.js"></script>
<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>
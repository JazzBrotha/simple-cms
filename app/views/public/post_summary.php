<?php
$plainTextBody = strip_tags($post['body']);
$summary = substr($plainTextBody, 0, 50);?>

<div class="post-preview">
    <!--print title-->
    <a href="<?php echo BASE_URL; ?>/page.php?post_id=<?php echo $post['post_id']; ?>">
        <h2 class="post-title">
            <?php echo escape($post['title']); ?>
        </h2>
        <!--print summary-->
        <h3 class="post-subtitle">
            <?php echo $summary ?>...</h3>
    </a>
    <!--print author-->
    <p class="post-meta mt-4">
        Posted by
        <a href="<?php echo BASE_URL . '/public/user.php?user_id=' . $post['user_id'];?>">
            <?php echo $post['firstname'] . " " . $post['lastname']; ?>
        </a> <span class="border-right">
                <!--print dates-->
                    on
                    <?php $post['created'] = new DateTime($post['created']);
                    echo $post['created']->format('M jS Y'); ?>
                    </span>
        <!--print likes-->
        <i class="fa fa-heart-o" aria-hidden="true"></i>
        <?php
                    $likeCount->execute([':postId' => $post['post_id']]);
                    $res = $likeCount->fetch(PDO::FETCH_ASSOC);
                    echo $res['COUNT(*)']; ?>
            <!--print tags-->
            <br>
            <?php foreach (explode(',',$post['tags']) as $tag): ?>
            <a href="<?php echo BASE_URL . '/public/tag.php?tag=' . $tag?>">
                <span href="#" class="badge badge-pill badge-default"><?php echo $tag; ?></span></a>
            <?php endforeach; ?>
    </p>
</div>
<hr>
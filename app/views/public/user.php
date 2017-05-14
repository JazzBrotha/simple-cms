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

<!--post-->

<?php require VIEW_ROOT . '/public/feed_container.php'; ?>

<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>

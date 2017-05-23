<?php require VIEW_ROOT . '/public/templates/header.php';?>
<header class="masthead" style="background-image:url(<?php echo BASE_URL; ?>/assets/img/contact-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-2 col-md-12 offset-md-1">
                <div class="d-flex justify-content-between align-items-center">
                    <!--print name, occupation, presentation, member since-->
                    <div class="post-heading">
                        <div>
                            <h1>
                                <?php echo '#' . $tag; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
require VIEW_ROOT . '/public/feed_container.php';
require VIEW_ROOT . '/public/templates/footer.php';
?>

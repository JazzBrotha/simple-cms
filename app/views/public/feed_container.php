<!--post-->
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1" id="posts-container">

            <?php if (empty($posts)): ?>
            <h2>Could not find any posts</h2>
            <?php else: ?>
            <?php foreach ($posts as $post){
                require VIEW_ROOT . '/public/post_summary.php';
            }
            ?>
            <?php endif; ?>

            <!--<div class="clearfix" id="post-navigation">
      <a class="btn btn-secondary float-right pointer" id="older-posts">Older Posts &rarr;</a>
  </div>-->
        </div>
        <hr>
    </div>
</div>

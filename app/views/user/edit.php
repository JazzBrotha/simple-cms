<?php require VIEW_ROOT . '/user/templates/header.php'; ?>
<?php require VIEW_ROOT . '/user/templates/sidenav.php'; ?>
<?php require APP_ROOT . '/password.php';?>

<!--JS for editor-->
<script src="<?php echo 'https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=' . $mce_key; ?>"></script>
<script src="<?php echo BASE_URL . '/assets/js/editor.js' ?>"></script>

<h2>Edit post</h2>

<form method="POST" action="<?php echo BASE_URL; ?>/user/edit.php" class="d-flex mt-2" autocomplete="off">
    <div class="col-md-10">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo $page['title']; ?>" class="form-control" maxlength="50"
                required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="text-area" class="form-control" required><?php echo $page['body']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="tags">Tags:</label>
            <input type="text" name="tags" id="tags" value="<?php echo $page['tags']; ?>" class="form-control" maxlength="30"
                required>
        </div>
        <input type="hidden" name="post_id" value="<?php echo $page['post_id']; ?>">
        <div class="form-group">
            <button class="btn btn-primary" id="post-preview-btn">Preview</button>
            <input type="submit" class="btn btn-primary" value="Update">
        </div>
    </div>
</form>

<?php require VIEW_ROOT . '/user/templates/footer.php'; ?>

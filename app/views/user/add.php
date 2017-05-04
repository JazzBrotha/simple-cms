<?php 
require VIEW_ROOT . '/templates/header.php'; 
require APP_ROOT . '/password.php';
?>

<!--JS for editor-->
<script src="<?php echo 'https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=' . $mce_key; ?>"></script>
<script src="<?php echo BASE_URL . '/assets/js/editor.js' ?>"></script>


<h2>Add post</h2>
<form method="POST" action="<?php echo BASE_URL; ?>/user/add.php" class="d-flex mt-2" autocomplete="off">
    <div class="col-md-10">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" maxlength="50" required>
        </div>
        <!--<div class="form-group">
            <label for="label">Label</label>
            <input type="text" name="label" id="label" class="form-control" maxlength="20" required>
        </div>-->
        <!--<div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" maxlength="30" required>
        </div>-->
        <!--<div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" cols-"30" rows="10" resize="none" class="form-control" required></textarea>
        </div>-->
        <div class="form-group">
            <label for="body">Post body:</label>
            <textarea id="text-area" name="body"></textarea>
        </div>
        <div class="form-group">
            <label for="tags">Tags:</label>
            <input type="text" class="form-control" name="tags" placeholder="Tags, Separated, By, Comma" maxlength="50" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" id="post-preview-btn">Preview</button>
            <input type="submit" class="btn btn-primary" value="Add">
        </div>

                


    </div>
</form>

<?php require VIEW_ROOT . '/templates/footer.php'; ?>

<?php require VIEW_ROOT . '/user/templates/header.php'; ?>
<?php require VIEW_ROOT . '/user/templates/sidenav.php'; ?>
<?php require APP_ROOT . '/password.php'; ?>

 <div id="page-content-wrapper">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-lg-12 col-xs-6">

<!--JS for editor-->
<script src="<?php echo 'https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=' . $mce_key; ?>"></script>
<script src="<?php echo BASE_URL . '/assets/js/editor.js' ?>"></script>
<div class="container">
    <h2>Add post</h2>
    <form method="POST" action="<?php echo BASE_URL; ?>/user/add.php" class="d-flex mt-2" autocomplete="off">
        <div class="col-md-10">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" maxlength="50" required>
            </div>
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
</div>

    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-arrows-h" aria-hidden="true"></i> Toggle</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

<?php require VIEW_ROOT . '/user/templates/footer.php'; ?>

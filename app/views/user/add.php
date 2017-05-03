<?php require VIEW_ROOT . '/templates/header.php'; ?>

<h2>Add post</h2>
<form method="POST" action="<?php echo BASE_URL; ?>/user/add.php" class="d-flex mt-2" autocomplete="off">
    <div class="col-md-6">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" maxlength="20" required>
        </div>
        <div class="form-group">
            <label for="label">Label</label>
            <input type="text" name="label" id="label" class="form-control" maxlength="20" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" maxlength="30" required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" cols-"30" rows="10" resize="none" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn" value="Add">
        </div>
    </div>
</form>

<?php require VIEW_ROOT . '/templates/footer.php'; ?>

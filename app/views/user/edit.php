<?php require VIEW_ROOT . '/user/templates/header.php'; ?>
<?php require VIEW_ROOT . '/user/templates/sidenav.php'; ?>

<h2>Edit post</h2>

<form method="POST" action="<?php echo BASE_URL; ?>/user/edit.php" class="d-flex mt-2" autocomplete="off">
    <div class="col-md-6">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo escape($page['title']); ?>" class="form-control" maxlength="20" required>
        </div>
        <div class="form-group">
            <label for="label">Label</label>
            <input type="text" name="label" id="label" value="<?php echo escape($page['label']); ?>" class="form-control" maxlength="20" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="<?php echo escape($page['slug']); ?>" class="form-control" maxlength="30" required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" resize="none" class="form-control" required><?php echo escape($page['body']); ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo escape($page['id']); ?>">
        <div class="form-group">
            <input type="submit" class="btn" value="Edit">
        </div>
    </div>
</form>

<?php require VIEW_ROOT . '/user/templates/footer.php'; ?>

<?php require VIEW_ROOT . '/public/templates/header.php'; ?>

<section class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <h2 class="text-center">Login</h2>
            <form method="POST" action="<?php echo BASE_URL; ?>/public/login.php"> 
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <input class="btn" type="submit">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo BASE_URL; ?>/public/register.php">Register account</a>
        </div>
    </div>
</section>

<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>

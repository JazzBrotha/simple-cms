<?php require VIEW_ROOT . '/user/templates/header.php'; ?>
<?php require VIEW_ROOT . '/user/templates/sidenav.php'; ?>
<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
<div class="container">
    <h2>Edit user</h2>
    <form method="POST" action="<?php echo BASE_URL . '/user/edit_user.php?user_id=' . $userId ?>" class="d-flex mt-2">
        <div class="col-md-6">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" maxlength="20" value="<?php echo $user['username']?>" readonly>
            </div>
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" class="form-control" maxlength="30" value="<?php echo $user['firstname']?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" class="form-control" maxlength="30" value="<?php echo $user['lastname']?>" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" maxlength="30" value="<?php echo $user['email']?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="profession">Profession</label>
                <input type="text" name="profession" class="form-control" maxlength="30" value="<?php echo $user['profession']?>">
            </div>
            <div class="form-group">
                <label for="profession">Pofile pic URL</label>
                <input type="text" name="picture" class="form-control" maxlength="30" value="<?php echo $user['picture']?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3" maxlength="200"><?php echo $user['description']?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="register-user-button">
                <div>
                </div>
            </div>
          </form>
        </div>
        <div class="container">
              <button class="btn btn-danger" role="button" data-link="<?php echo BASE_URL; ?>/user/delete_user.php" id="delete-user-btn">Delete account</button>
            </div>

    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-arrows-h" aria-hidden="true"></i> Toggle</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->


    </div>


<?php require VIEW_ROOT . '/user/templates/footer.php'; ?>

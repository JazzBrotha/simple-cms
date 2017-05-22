<?php
require '../app/start.php';
require APP_ROOT . '/classes/user.php';

if (!empty($_POST)) {

	$password = $_POST["password"];

	$encryptpwd = password_hash($password, PASSWORD_DEFAULT);

    $newUser = new User($_POST["username"], $encryptpwd, $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["profession"], $_POST["picture"], $_POST["description"], $pdo);
		$checkUser = $pdo->prepare("SELECT username
				FROM users
				WHERE username = :user
				");
		$checkUser->bindParam(':user', $newUser->username);
		$checkUser->execute();

		$checkEmail = $pdo->prepare("SELECT email 
			FROM users 
			WHERE email = :user");
		$checkEmail->bindParam(':user', $newUser->email);
		$checkEmail->execute();

		if ($checkUser->rowCount() > 0) {
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Sorry, Username already exists");';
  			echo '}, 1000);</script>';
		} elseif($checkEmail->rowCount() > 0) {
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Sorry, Email already exists");';
  			echo '}, 1000);</script>';
		} else {
			$newUser->store_user();

	    header('Location: ' . BASE_URL . '/public/login.php?newuser=true');
		}

}

$headTitle = 'Register account';
require VIEW_ROOT . '/public/register.php';

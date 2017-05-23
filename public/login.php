<?php
require '../app/start.php';

if (!empty($_POST)) {
	require APP_ROOT . '/classes/user.php';

	$username = $_POST['username']; 
	$pwd = $_POST['password']; 


	// de-hashing
	$select = "SELECT * FROM users WHERE username='$username'";
	$outcome = $pdo->prepare($select);
	$outcome->execute();
	$userselect = $outcome->fetch();
	$hash_pwd = $userselect['password']; 
	$hash = password_verify($pwd, $hash_pwd); 


	//if hash-password is false 
	if ($hash == 0) {
		// echo "Your username or password is incorrect";
		header('Location: ' . BASE_URL . '/public/login.php?failed=true');

	} else { 
		//CHECKS WITH PASSWORD IN DATABASE
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$hash_pwd'";
		$result = $pdo->prepare($sql);
		$result->execute();
		$user = $result->fetch();

		if (!$user){
			// echo "Your username or password is incorrect"; 
			header('Location: ' . BASE_URL . '/public/login.php?failed=true');
		} 
		if($user) {	
			$_SESSION["loggedin"] = true;
			$_SESSION["is_admin"] = $user["is_admin"];
			$_SESSION["username"]=$user["username"];
			$_SESSION["user_id"]=$user["user_id"];
			if ($_SESSION['redirect']) {
				header('Location: ' . BASE_URL . '/page.php?post_id=' . $_SESSION['redirect']);
			}
			else {
				header('Location: ' . BASE_URL . '/user/list.php');
			}
		}
	}
}

$headTitle = 'Login';
require VIEW_ROOT . '/public/login.php';


?>

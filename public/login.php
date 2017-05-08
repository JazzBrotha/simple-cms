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
 	echo "Your username or password is incorrect";

 } else { 

//CHECKS WITH PASSWORD IN DATABASE
$sql = "SELECT * FROM users WHERE username='$username' AND password='$hash_pwd'";
$result = $pdo->prepare($sql);
$result->execute();
$user = $result->fetch();

if (!$user){
	echo "Your username or password is incorrect"; 
} if($user) {
	header('Location: ' . BASE_URL . '/user/list.php');
}
}
}
require VIEW_ROOT . '/public/login.php';

?>

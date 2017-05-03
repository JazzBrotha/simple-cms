<?php
require "../classes/user.php";
require "../resources/error.php";
require "../resources/pdo.php";

$new_user = new User($_POST["username"], $_POST["password"], $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["profession"], $_POST["description"], $pdo);
    $statement = $new_user->store_user();
    $statement->execute();
    echo "user was created!";
    
?>


<?php

include('../config/init_action.php');
include('../database/user.php');

$username = trim(strip_tags($_POST['username']));
$password = $_POST['password'];
$email = trim(strip_tags($_POST['email']));
$firstname = trim(strip_tags($_POST['firstname']));
$lastname = trim(strip_tags($_POST['lastname']));
$type = trim(strip_tags($_POST['type']));

if ($username != "") {
    if (validateUsername($username)) {
        createUser($username, $password, $email, $firstname, $lastname, $type);
        $_SESSION['username'] = $username;
        $_SESSION['id'] = getUserId($username);
        header("Location: ../index.php");
    }else{
        echo 'invalid user';
    }
}

?>

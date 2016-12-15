<?php

require_once('../config/init_action.php');
require_once('../database/user.php');

$username = trim(strip_tags($_POST['username']));
$password = $_POST['password'];

if (verifyUser($username, $password)) {
    $_SESSION['username'] = $username;
    $_SESSION['id'] = getUserId($username);
    echo 'success';
} else {
    echo 'fail';
}

?>

<?php

require_once('../config/init_action.php');
require_once('../database/user.php');
require_once('../database/upload.php');

$firstname = trim(strip_tags($_POST['firstname']));
$lastname = trim(strip_tags($_POST['lastname']));
$email = trim(strip_tags($_POST['email']));
$password = $_POST['password'];
$bio = trim(strip_tags($_POST['bio']));
$id = $_SESSION['id'];

if ($firstname != '') {
    updateFirstName($firstname, $id);
}

if ($lastname != '') {
    updateLastName($lastname, $id);
}

if ($_FILES['image']['tmp_name'] != '') {
    $imageId = uploadImage();
    updatePhoto($imageId, $id);
}

if ($email != '') {
    updateEmail($email, $id);
}

if ($password != '') {
    updatePassword($password,$id);
}

if ($bio != '') {
    updateBio($bio, $id);
}

header('Location: ../user_page.php?username=' . getUsername($id));

?>

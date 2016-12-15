<?php

require_once('../config/init_action.php');
require_once('../database/restaurant.php');
require_once('../database/upload.php');

$id = $_POST['restaurantid'];
$name = trim(strip_tags($_POST['name']));
$website = trim(strip_tags($_POST['website']));
$address = trim(strip_tags($_POST['address']));
$description = trim(strip_tags($_POST['description']));

if ($_FILES['image']['tmp_name'] != '') {
    $imageId = uploadImage();
    updateRestaurantPhoto($imageId, $id);
}

if ($name != '') {
    updateRestaurantName($name, $id);
}

if ($website != '') {
    updateRestaurantWebsite($website, $id);
}

if ($address != '') {
    updateRestaurantAddress($address, $id);
}

updateRestaurantDescription($description, $id);

header('Location: ../restaurant_page.php?restaurant=' . $id);

?>


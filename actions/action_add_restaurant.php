<?php

require_once('../config/init_action.php');
require_once('../database/restaurant.php');
require_once('../database/upload.php');

$name = trim(strip_tags($_POST['name']));
$description = trim(strip_tags($_POST['description']));
$website = trim(strip_tags($_POST['website']));
$address = trim(strip_tags($_POST['address']));
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$owner = $_SESSION['id'];

if ($name != "" && $description != "" && $_FILES['image']['tmp_name'] != '') {
    $imageId = uploadImage();
    $id = createRestaurant($owner, $name, $description, $website, $imageId, $address, $lat, $lng);
    header("Location: ../restaurant_page.php?restaurant=" . $id);
}else{
    header("Location: ../add_restaurant.php");
}

?>

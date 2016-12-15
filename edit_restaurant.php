<?php

include('config/init.php');
include('templates/head.php');
include('templates/header.php');
include_once('database/restaurant.php');

$restaurantid = $_GET['restaurant'];
$photoId = getRestaurantPhoto($restaurantid);
$image = getImagePath($photoId);

$name = getRestaurantName($restaurantid);
$description = getRestaurantDescription($restaurantid);
$website = getRestaurantSite($restaurantid);
$address = getRestaurantAddress($restaurantid);

include('templates/form_edit_restaurant.php');
include('templates/image.php');
include('templates/footer.php');

?>

<?php

include('config/init.php');
include('templates/head.php');
include('templates/header.php');
include_once('database/restaurant.php');
include_once('database/review.php');
include_once('database/comment.php');
include_once('database/user.php');

$restaurantid = $_GET['restaurant'];

include('templates/form_add_review.php');
include('templates/image.php');
include('templates/footer.php');

?>

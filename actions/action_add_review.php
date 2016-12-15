<?php

require_once('../config/init_action.php');
require_once('../database/restaurant.php');
require_once('../database/user.php');
require_once('../database/review.php');
require_once('../database/comment.php');

$restaurantid = $_POST['restaurantid'];
$score = $_POST['score'];
$comment = trim(strip_tags($_POST['comment']));

$commentid = Comment::createReviewComment($_SESSION['id'], $comment);

Review::createReview($restaurantid, $commentid, $score);

header('Location: ../restaurant_page.php?restaurant=' . $restaurantid);

?>


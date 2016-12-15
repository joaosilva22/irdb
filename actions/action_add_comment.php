<?php

require_once('../config/init_action.php');
require_once('../database/restaurant.php');
require_once('../database/user.php');
require_once('../database/review.php');
require_once('../database/comment.php');

$reviewid = $_POST['reviewid'];
$parent = Review::getComment($reviewid);
echo $parent;
$comment = trim(strip_tags($_POST['comment']));

$commentid = Comment::createComment($_SESSION['id'], $parent, $comment);

header('Location: ../review_page.php?review=' . $reviewid);

?>


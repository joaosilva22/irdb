<?php

require_once('../config/init_action.php');
require_once('../database/restaurant.php');
require_once('../database/user.php');
include('../database/review.php');
include('../database/comment.php');

$reviewid = $_POST['reviewid'];
$parent = $_POST['parent'];

$comment = trim(strip_tags($_POST['comment']));

$commentid = Comment::createComment($_SESSION['id'], $parent, $comment);

header('Location: ../review_page.php?review=' . $reviewid);

?>


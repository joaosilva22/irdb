<?php
include('config/init.php');
include('templates/head.php');
include('templates/header.php');

include_once('database/user.php');
include_once('database/restaurant.php');
include_once('database/review.php');
include_once('database/comment.php');
include_once('database/image.php');

$commentid = $_GET['comment'];
$reviewid = $_GET['review'];

$restaurantName = Review::getRestaurantName($reviewid);
$score = Review::getScore($reviewid);
$firstName = Review::getReviewerFirstName($reviewid);
$lastName = Review::getReviewerLastName($reviewid);
$comment = Review::getReviewComment($reviewid);
$comments = Review::getComments($reviewid);

?>
<div>
	<form class="form" id="add_comment" action="actions/action_add_reply.php" method="post" enctype="multipart/form-data">
		<div class="form_header">
			<?php 
				Comment::printCommentOnly($commentid);
				?><hr class"divider" /><?php
			?>
			
			<div class="inputs">
				<input type="hidden" name="reviewid" value="<?=$reviewid?>" required>
				<input type="hidden" name="parent" value="<?=$commentid?>" required>
				<textarea name="comment" placeholder="Comment" rows="5" cols="70" required></textarea>
				<input type="submit" value="Submit">
			</div>
		</div>
	</form>
</div>

<?php
include('templates/footer.php');
?>

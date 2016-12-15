<?php
include('config/init.php');
include('templates/head.php');
include('templates/header.php');

include_once('database/user.php');
include_once('database/restaurant.php');
include_once('database/review.php');
include_once('database/comment.php');
include_once('database/image.php');

$reviewid = $_GET['review'];

$restaurantName = Review::getRestaurantName($reviewid);
$score = Review::getScore($reviewid);
$firstName = Review::getReviewerFirstName($reviewid);
$lastName = Review::getReviewerLastName($reviewid);
$comment = Review::getReviewComment($reviewid);
$comments = Review::getComments($reviewid);
$reviewer = Review::getReviewer($reviewid);
$reviewerUsername = getUsername($reviewer);
$timestamp = Review::getTimestamp($reviewid);
$restaurantid = Review::getRestaurant($reviewid);
$owner = getRestaurantOwner($restaurantid);

?>

<div>
    <h1><a href="restaurant_page.php?restaurant=<?=$restaurantid?>"><?=$restaurantName?></a></h1>
    <p>Review by <a href="user_page.php?username=<?=$reviewerUsername?>"><?=$firstName . ' ' . $lastName?></a> <?=$timestamp?></p>
    <h4><?=$score?></h4>
    <p><?=$comment?></p>
</div>

<div>
	<h2>Comments</h2>
	<?php 
		foreach($comments as $com) {
			Comment::printComment($com['Id'], $reviewid, $owner);
			?><hr id="divider" /><?php
		}
		
		if (isset($_SESSION['id'])) {
	?>
	
	<form id="add_comment" action="actions/action_add_comment.php" method="post" enctype="multipart/form-data">
	<div>
	    <p>Make a comment</p>
	</div>
	<div>
		<input type="hidden" name="reviewid" value="<?=$reviewid?>" required>
	    <textarea name="comment" placeholder="Comment" rows="5" cols="70" required></textarea>
	    <input type="submit" value="Submit">
	</div>
    </form>
	
		<?php }
		?>
</div>

<?php
include('templates/footer.php');
?>

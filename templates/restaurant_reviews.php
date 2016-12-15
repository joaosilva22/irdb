<?php
$reviews = getRestaurantReviews($id);
?>

<div>
    <h1>Reviews</h1>
    <?php 
		foreach($reviews as $review) {
			Review::printReviewHead($review);
			?><a href="review_page.php?review=<?=$review['Id']?>">View</a></p><?php
		}
	?>
</div>

<?php
$reviews = getRestaurantReviews($id);
?>

<ul>
    <?php 
		foreach($reviews as $review) { ?>
			<li><?php
			Review::printReviewHead($review);
			?><a href="review_page.php?review=<?=$review['Id']?>">View</a></p></li><?php
		}
	?>
</ul>

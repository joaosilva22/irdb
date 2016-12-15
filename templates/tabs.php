<div>
  <ul id="tabs">
    <li id="highestRated">
	<a href="#highestRated">Highest Rated</a>
	<div >
	    <ul class="restaurant_list">
		<?php
		$highest = getHighestScoredRestaurants(10);
		foreach($highest as $restaurant) {
		    echo '<li>';
		    echo '<h2>' . '<a href="restaurant_page.php?restaurant=' . $restaurant['Id'] . '">' .  $restaurant['Name'] . '</a> ' .  $restaurant['AverageScore'] . '&#9733</h2>';
		    echo '<p>' . $restaurant['Description'] . '</p>';
		    echo '</li>';
		}
		?>
	    </ul>
      </div>
    </li>

    <li  id="latestReview">
      <a href="#latestReview">Latest Review</a>
      <div>
	  <ul class="restaurant_list">
	      <?php
	      $latest = Review::getLatestReviews(10);
	      foreach($latest as $review) {
		  echo '<li>';
		  echo '<h2>' . '<a href="restaurant_page.php?restaurant=' . $review['Restaurant'] . '">' . Review::getRestaurantName($review['Restaurant']) . '</a> ' .  $review['Score'] . ' ' . $review['Timestamp'] . '</h2>';
		  echo '</li>';
	      }
	      ?>
	  </ul>
      </div>
    </li>

    <hr id="tabUnderline" />

    <hr id="division" />
  </ul>

  <div id="wellcome">BRIEF DESCRIPTION OF THE SITE (OR SOME STUFF)</div>

</div>

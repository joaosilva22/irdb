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
            Phasellus varius urna in nulla molestie lacinia. Nam in est elit, ut placerat lectus. Sed consequat 
            dui vel sapien condimentum ut facilisis 
            quam lacinia. Proin nec libero at sem pretium dignissim. Aliquam auctor egestas elit vel ornare. 
            Fusce consectetur sagittis nulla ac congue. 
            Mauris eu mattis nibh. Nunc turpis eros, pharetra in vestibulum eget, tristique id enim. In hac 
            habitasse platea dictumst. Pellentesque volutpat, arcu posuere sagittis elementum, sem odio 
            condimentum tortor, at tempus velit nisi quis tortor. Praesent vitae sodales sem. 
            Vivamus posuere egestas sapien at rhoncus. Pellentesque habitant morbi tristique senectus et netus 
            et malesuada fames ac turpis egestas. 
            Mauris semper velit at risus faucibus fermentum. Nam molestie, libero non feugiat adipiscing, risus 
            magna laoreet tortor, in tincidunt est quam quis dui. Aliquam feugiat libero at magna rhoncus vitae 
            ullamcorper ipsum euismod. 
      </div>
    </li>

    <hr id="tabUnderline" />

    <hr id="division" />
  </ul>

  <div id="wellcome">BRIEF DESCRIPTION OF THE SITE (OR SOME STUFF)</div>

</div>

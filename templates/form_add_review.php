<div>
    <form id="add_review" class="form" action="actions/action_add_review.php" method="post" enctype="multipart/form-data">
	<div class="form_header">
	    <h1>Review Restaurant</h1>
	</div>
	<hr class="divider"/>
	<div class="inputs">
		<input type="hidden" name="restaurantid" value="<?=$restaurantid?>" required>
	    <input type="number" name="score" min="0" max="10" id="score" required>
	    <textarea name="comment" placeholder="Comment" rows="5" cols="70" id="comment"></textarea>
	    <input type="submit" value="Submit">
	</div>
    </form>
</div>

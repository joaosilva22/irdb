<div>
    <form id="edit_restaurant" class="form" action="actions/action_edit_restaurant.php" method="post" enctype="multipart/form-data">
	<div class="form_header">
	    <h1>Edit Restaurant</h1>
	</div>
	<hr class="divider"/>
	<div class="inputs">
	    <img src="../images/thumbs_medium/<?=$image?>">
	    <input type="hidden" name="restaurantid" value="<?=$restaurantid?>">
	    <input type="file" name="image">
	    <input type="text" placeholder="<?=$name?>" name="name">
	    <input type="url" placeholder="<?=$website?>" name="website">
	    <input type="address" placeholder="<?=$address?>" name="address">
	    <textarea name="description" rows="5" cols="70"><?=$description?></textarea>
	    <input type="submit" value="Save Changes">
	</div>
    </form>
</div>

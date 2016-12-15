<div>
    <form id="edit_restaurant" class="form" action="actions/action_edit_restaurant.php" method="post" enctype="multipart/form-data">
	<div class="form_header">
	    <h1>Edit Restaurant</h1>
	</div>
	<hr class="divider"/>
	<div class="inputs">
	    <img src="../images/thumbs_medium/<?=$image?>">
	    <input type="hidden" name="restaurantid" value="<?=$restaurantid?>">
	    <label>Photo</label><input type="file" name="image">
	    <label>New Name</label><input type="text" placeholder="<?=$name?>" name="name">
	    <label>New Website</label><input type="url" placeholder="<?=$website?>" name="website">
	    <label>New Address</label><input type="address" placeholder="<?=$address?>" name="address">
	    <label>Description</label><textarea name="description" rows="5" cols="70"><?=$description?></textarea>
	    <input type="submit" value="Save Changes" id="submit">
	</div>
    </form>
</div>

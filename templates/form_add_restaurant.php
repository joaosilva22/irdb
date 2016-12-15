<div>
    <form id="add_restaurant" class="form" action="actions/action_add_restaurant.php" method="post" enctype="multipart/form-data">
        <div class="form_header">
            <h1>Add Restaurant</h1>
        </div>
        <hr class="divider" />
        <div class="inputs">
            <label>Name</label>
                <input type="text" name="name" placeholder="Restaurant name" id="name">
            <label>Description</label>
                <textarea name="description" id="description" rows="10" cols="50" placeholder="Write your description here."></textarea>
            <label>Website</label>
                <input type="url" name="website" placeholder="ex:website.com" id="website">
            <label>Photo</label>
                <input type="file" name="image" id="image">
            <label>Address</label>
    	    <input type="text" name="address" id="address">
    	    <input type="hidden" name="lat" value="0.0" id="lat">
    	    <input type="hidden" name="lng" value="0.0" id="lng">
            <br>
            <input id="submit" type="submit" name="submit" value="Add Restaurant">
        </div>
    </form>
</div>

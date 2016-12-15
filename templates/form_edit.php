<?php

require_once('database/image.php');

$photoId = getPhoto($_SESSION['id']);
$image = getImagePath($photoId);

$id = $_SESSION['id'];
$firstname = getFirstName($id);
$lastname = getLastName($id);
$email = getEmail($id);
$bio = getBio($id);

?>

<div>
    <form id="edit" class="form" action="actions/action_edit.php" method="post" enctype="multipart/form-data">
	<div class="form_header">
            <h1>Edit Profile</h1>
	</div>
	<hr class="divider" />
	<div class="inputs">
	    <img src="../images/thumbs_medium/<?=$image?>">
	    <label>New Image</label><input type="file" name="image">
	    <label>New First Name</label><input type="text" placeholder="<?=$firstname?>" name="firstname" id="firstname" />
	    <label>New Last Name</label><input type="text" placeholder="<?=$lastname?>" name="lastname" id="lastname" />
	    <label>New Email</label><input type="email" placeholder="<?=$email?>" name="email" id="email" />
	    <label>New Password</label><input type="password" placeholder="New Password" name="password" id="password" />
	    <label>Confirm Password</label><input type="password" placeholder="Confirm New Password" name="confirm_password" id="confirm_password"/>
	    <label>New Bio</label><textarea name="bio" id="bio" rows="2" cols="70"><?=$bio?></textarea>
	    <input type="submit" id="submit" value="Save Changes"/>
	</div>
    </form>
</div>

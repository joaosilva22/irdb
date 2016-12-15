<?php
$photoId = getPhoto($_SESSION['id']);

$stmt = $conn->prepare('SELECT * FROM Image WHERE Id = ?');
$stmt->execute(array($photoId));

$image = $stmt->fetch();
?>

<div>
    <form id="signup" class="form" action="actions/action_upload_image.php" method="post" enctype="multipart/form-data">
	<div class="form_header">
            <h1>Edit Profile Image</h1>
	</div>
	<hr class="divider" />
	<div id="inputs">
	    <img src="./../images/thumbs_medium/<?=$image['Id']?>.<?=$image['Extension']?>">
	    <label>Image<input type="file" name="image"></label>
  	    <input type="submit" value="Upload">
	</div>
    </form>
</div>

<?php

function uploadImage() {
    global $conn;

    $allowed = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['image']['name'];
    $filename = strtolower($filename);
    $ext = pathinfo($filename,PATHINFO_EXTENSION);
    if(!in_array($ext, $allowed)){
	echo 'error';
	exit(1);
    }

    $title = $_POST['title'];
    $stmt = $conn->prepare("INSERT INTO image(extension) VALUES(?)");
    $stmt->execute(array($ext));

    $id = $conn->lastInsertId();

    switch ($ext) {
	case 'jpg':
	    $originalFileName = "../images/originals/$id.jpg";
	    $smallFileName = "../images/thumbs_small/$id.jpg";
	    $mediumFileName = "../images/thumbs_medium/$id.jpg";
	    break;
	case 'jpeg':
	    $originalFileName = "../images/originals/$id.jpeg";
	    $smallFileName = "../images/thumbs_small/$id.jpeg";
	    $mediumFileName = "../images/thumbs_medium/$id.jpeg";
	    break;
	case 'png':
	    $originalFileName = "../images/originals/$id.png";
	    $smallFileName = "../images/thumbs_small/$id.png";
	    $mediumFileName = "../images/thumbs_medium/$id.png";
	    break;
	case 'gif':
	    $originalFileName = "../images/originals/$id.gif";
	    $smallFileName = "../images/thumbs_small/$id.gif";
	    $mediumFileName = "../images/thumbs_medium/$id.gif";
	    break;
	default:
	    break;
    } 

    move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
    
    switch ($ext) {
	case 'jpg':
	case 'jpeg':
	    $original = imagecreatefromjpeg($originalFileName);
	    break;
	case 'png':
	    $original = imagecreatefrompng($originalFileName);
	    break;
	case 'gif':
	    $original = imagecreatefromgif($originalFileName);
	    break;
	default:
	    break;
    }
    
    $width = imagesx($original);
    $height = imagesy($original);
    $square = min($width, $height);

    // Create small square thumbnail
    $small = imagecreatetruecolor(50, 50); 
    imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 50, 50, $square, $square);
    
    switch ($ext) {
	case 'jpg':
	case 'jpeg':
	    imagejpeg($small, $smallFileName);
	    break;
	case 'png':
	    imagepng($small, $smallFileName);
	    break;
	case 'gif':
	    imagegif($small, $smallFileName);
	    break;
	default:
	    break;
    }

    $mediumwidth = $width;
    $mediumheight = $height;

    if ($mediumwidth > 400) {
	$mediumwidth = 400;
	$mediumheight = $mediumheight * ( $mediumwidth / $width );
    }

    $medium = imagecreatetruecolor($mediumwidth, $mediumheight); 
    imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
    
    switch ($ext) {
	case 'jpg':
	case 'jpeg':
	    imagejpeg($medium, $mediumFileName);
	    break;
	case 'png': 
	    imagepng($medium, $mediumFileName);
	    break;
	case 'gif':
	    imagegif($medium, $mediumFileName);
	    break;
	default:
	    break;
    }

    return $id;
}
?>

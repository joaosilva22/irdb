<?php
require_once('config/init.php');
include('templates/head.php');
require_once('templates/header.php');

include_once('database/user.php');
include_once('database/restaurant.php');
include_once('database/review.php');
include_once('database/image.php');

$id = $_GET['restaurant'];

$name = getRestaurantName($id);
$ownerId = getRestaurantOwner($id);
$ownerusername = getUsername($ownerId);
$owner = getUserFullname($ownerId);
$description = getRestaurantDescription($id);
$website = getRestaurantSite($id);

$address = getRestaurantAddress($id);
$lat = getRestaurantLatitude($id);
$lng = getRestaurantLongitude($id);

$photoId = getRestaurantPhoto($id);
$image = getImagePath($photoId);

?>

<div>
    <img src="./images/thumbs_medium/<?=$image?>">
    <h1><?=$name?></h1>
    <p><?=$description?></p>
    <h4><?=$website?></h4>
    <h4><?=$address?></h4>
    <div id="map" lat="<?=$lat?>" lng="<?=$lng?>"></div>
    <a href="user_page.php?username=<?=$ownerusername?>"><?=$owner?></a>
</div>

<?php
	if (isset($_SESSION['id'])) {
	if ($_SESSION['id'] == $ownerId) { ?>
		<a href="edit_restaurant.php?restaurant=<?=$id?>">Edit Restaurant</a>
<?php } ?>

<?php if (isReviewer($_SESSION['id'])) { ?>
    <a href="add_review.php?restaurant=<?=$id?>">Add Review</a>
	<?php }
	}
	?>

<?php
include('templates/restaurant_reviews.php');
include('templates/footer.php');
?>

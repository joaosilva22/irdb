<?php
require_once('config/init.php');
include('templates/head.php');
require_once('templates/header.php');
require_once('templates/image.php');

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

$avg = getAverageScore($id);

?>

<div>
    <ul id=tabs>
    <li id="user_tab">
        <a href="#user_tab"><?=$name?> <?=$avg?>&#9733</a>
        <div>
            <img src="./images/thumbs_medium/<?=$image?>">
            <h1><?=$name?> <?=$avg?>&#9733</h1>
            <p><?=$description?></p>
            <h4><?=$website?></h4>
            <h4><?=$address?></h4>
            <div id="map" lat="<?=$lat?>" lng="<?=$lng?>"></div>
            <a href="user_page.php?username=<?=$ownerusername?>"><?=$owner?></a>
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
        </div>
    </li>

    <li id="restaurants_tab">
        <a href="#restaurants_tab">Reviews</a>
        <div>
            <?php
            include('templates/restaurant_reviews.php');
            ?>
        </div>
    </li>
    <hr id="tabUnderline" />

    <hr id="division" />
    </ul>
    <div id="wellcome"></div>
</div>
<?php
include('templates/footer.php');
?>
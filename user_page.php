<?php
include('config/init.php');
include('templates/head.php');

include('templates/header.php');
include('templates/image.php');

include_once('database/user.php');
include_once('database/restaurant.php');
include_once('database/review.php');

$username = $_GET['username'];
$id = getUserId($username);

$type = getUserType($id);
$fullname = getUserFullname($id);
$bio = getBio($id);
$email = getEmail($id);

$photoId = getPhoto($id);
$image = getImagePath($photoId);
?>
<div>
    <ul id="tabs">
    <li id="user_tab">
        <a href="#user_tab"><?=$fullname?></a>
        <div>
            <h3><?=$type?></h3>
            <img src="./images/thumbs_medium/<?=$image?>">
            <h1><?=$fullname?></h1>
            <h2>@<?=$username?></h2>
            <p><?=$bio?></p>
            <p><?=$email?></p>

            <?php if ($id == $_SESSION['id']) { ?>
                <a href="edit_user.php">Edit Profile</a>

            <?php
            if ($type == 'Owner') { ?>
                <a href="add_restaurant.php">Add Restaurant</a>
            <?php } 
            } ?>
        </div>
    </li>
    <?php
        if ($type == 'Owner') {
            $restaurants = getAllRestaurantsFromPerson($id);?>
    <li id="restaurants_tab">
        <a href="#restaurants_tab">Restaurants</a>
        <div >
            <ul class="restaurant_list">
            <?php
            foreach($restaurants as $restaurant) { ?>
            <li>
                <a href="restaurant_page.php?restaurant=<?=$restaurant['Id']?>"><?=$restaurant['Name']?> <?=getAverageScore($restaurant['Id'])?>&#9733</a>
                <p><?=$restaurant['Description']?></p>
            </li>
            <?php } ?>
            </ul>
        </div>
    </li>
    <?php
    }
    ?>

    <?php
        if ($type == 'Reviewer') {
            $reviews = Review::getAllReviewsFromPerson($id);?>
    <li id="reviews_tab">
        <a href="#reviews_tab">Reviews</a>
        <div >
            <ul class="restaurant_list">
            <?php
            foreach($reviews as $review) { ?>
            <li>
                <?php Review::printReviewHead($review);?>
		<a href="review_page.php?review=<?=$review['Id']?>">View</a>
            </li>
            </ul>
        </div>
    </li>
    <?php }
    }
    ?>

    <hr id="tabUnderline" />

    <hr id="division" />
    </ul>

    <div id="wellcome"></div>
</div>
<?php
include('templates/footer.php');
?>

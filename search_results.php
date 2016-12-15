<?php
include('config/init.php');
include('templates/head.php');
include('templates/header.php');
include_once('database/restaurant.php');

$string = $_POST['search'];
$results = searchRestaurants($string);

echo '<h1>Search Results: </h1>';
echo '<div>';

foreach($results as $result) {
?>
    <a href="restaurant_page.php?restaurant=<?=$result['Id']?>"><?=$result['Name']?></a><br>
<?php
}

echo '</div>';

include('templates/footer.php');
?>

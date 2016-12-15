<?php
include('config/init.php');
include('templates/head.php');
include('templates/header.php');
include('templates/image.php');
include_once('database/restaurant.php');

$string = $_POST['search'];
$results = searchRestaurants($string);?>

<div>
<form class="form">
	<div class="form_header">
		<h1>Search Results: </h1>
	</div>
	<hr class="divider"/>
	<div class="inputs">
	<ul>
	<?php foreach($results as $result) {
	?>
	    <li id="search_result"><a id="res_result" href="restaurant_page.php?restaurant=<?=$result['Id']?>"><?=$result['Name']?></a></li>
	<?php
	}
	?>
	</ul>
	</div>
</form>
</div>
<?php
include('templates/footer.php');
?>

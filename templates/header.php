<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once('config/init.php');
require_once('database/user.php');
require_once('database/image.php');

if (isset($_SESSION['id'])) {
    $photoId = getPhoto($_SESSION['id']);
    if($photoId !== false){
    $image = getImagePath($photoId);
    }
    $fullname = getUserFullName($_SESSION['id']);
}

?>

<div class="header">
    <ul class="navbar">
        <li class="irdb"><a href="index.php">IRDb</a></li>
        <li class="search_bar">
            <form action="search_results.php" method="post">
                <input type="search" name="search" placeholder="Restaurant name">
                <input type="submit" value="Find Restaurant">
            </form>
        </li>

        <?php
        if (isset($_SESSION['id'])) {
            if ($image !== false) {?>
            <li class="logout"><?php require_once('templates/form_logout.php');?></li>
            <li class="user">
                <a href="user_page.php?username=<?=$_SESSION['username']?>"><?=$fullname?> </a>
            </li>
            <li class="profile_pic"><img src="./images/thumbs_small/<?=$image?>"></li>
        <?php } 
        } else { 
        ?>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Log In</a></li>
        <?php 
        }
        ?>
    </ul>
</div>

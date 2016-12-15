<?php

function createRestaurant($owner, $name, $description, $website, $photo, $address, $lat, $lng) {
    global $conn;

    $stmt = $conn->prepare('INSERT INTO Restaurant(Owner, Name, Description, Website, Photo, Address, Latitude, Longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($owner, $name, $description, $website, $photo, $address, $lat, $lng));

    return $conn->lastInsertId();
}

function updateRestaurant($id, $description, $website, $photo) {
    global $conn;

    $stmt = $conn->prepare('UPDATE Restaurant SET Description=?, Website=?, Photo=? WHERE Id=?');
    $stmt->execute(array($description, $website, $photo, $id));
}

function deleteRestaurant($id) {
    global $conn;

    $stmt = $conn->prepare('DELETE FROM Restaurant WHERE Id=?');
    $stmt->execute(array($id));
}

function getRestaurantName($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Name FROM Restaurant WHERE Id = ?');
    $stmt->execute(array($id));

    $name = $stmt->fetch();
    return $name['Name'];
}

function getRestaurantOwner($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Owner FROM Restaurant WHERE Id = ?');
    $stmt->execute(array($id));

    $owner = $stmt->fetch();
    return $owner['Owner'];
}

function getRestaurantDescription($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Description FROM Restaurant WHERE Id = ?');
    $stmt->execute(array($id));

    $description = $stmt->fetch();
    return $description['Description'];
}

function getRestaurantSite($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Website FROM Restaurant WHERE Id = ?');
    $stmt->execute(array($id));

    $website = $stmt->fetch();
    return $website['Website'];
}

function getRestaurantPhoto($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Photo FROM Restaurant WHERE Id = ?');
    $stmt->execute(array($id));

    $photo = $stmt->fetch();
    return $photo['Photo'];
}

function updateRestaurantPhoto($photo, $id) {
    global $conn;

    $stmt = $conn->prepare('UPDATE Restaurant SET Photo = ? WHERE Id = ?');
    $stmt->execute(array($photo, $id));
}

function updateRestaurantName($name, $id) {
    global $conn;

    $stmt = $conn->prepare('UPDATE Restaurant SET Name = ? WHERE Id = ?');
    $stmt->execute(array($name, $id));
}

function updateRestaurantWebsite($website, $id) {
    global $conn;

    $stmt = $conn->prepare('UPDATE Restaurant SET Website = ? WHERE Id = ?');
    $stmt->execute(array($website, $id));
}

function updateRestaurantAddress($address, $id) {
    global $conn;

    $stmt = $conn->prepare('UPDATE Restaurant SET Address = ? WHERE Id = ?');
    $stmt->execute(array($address, $id));
}
    

function updateRestaurantDescription($description, $id) {
    global $conn;

    $stmt = $conn->prepare('UPDATE Restaurant SET Description = ? WHERE Id = ?');
    $stmt->execute(array($description, $id));
}

function getAllRestaurantsFromPerson($owner) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM Restaurant WHERE Owner = ?');
    $stmt->execute(array($owner));

    return $stmt->fetchAll();
}

function searchRestaurants($string) {
    global $conn;

    $stmt = $conn->prepare('SELECT Id, Name FROM RestaurantSearch WHERE Name LIKE ? OR Description LIKE ?');
    $stmt->bindValue(1, "%$string%", PDO::PARAM_STR);
    $stmt->bindValue(2, "%$string%", PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getRestaurantReviews($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM Review WHERE Restaurant = ?');
    $stmt->execute(array($id));
    
    $result = $stmt->fetchAll();

    return $result;
}

function getRestaurant($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM Restaurant WHERE Id = ?');
    $stmt->execute(array($id));

    return $stmt->fetchAll();
}

function getRestaurantAddress($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Address FROM Restaurant WHERE Id = ?');
    $stmt->execute(array($id));

    $address = $stmt->fetch();
    return $address['Address'];
}

function getRestaurantLatitude($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Latitude FROM Restaurant WHERE Id = ?');
    $stmt->execute(array($id));

    $latitude = $stmt->fetch();
    return $latitude['Latitude'];
}

function getRestaurantLongitude($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Longitude FROM Restaurant WHERE Id = ?');
    $stmt->execute(array($id));

    $longitude = $stmt->fetch();
    return $longitude['Longitude'];
}

function getAverageScore($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Score FROM Restaurant, Review WHERE Restaurant.Id = ? AND Restaurant.Id = Review.Restaurant');
    $stmt->execute(array($id));

    $scores = $stmt->fetchAll();

    $total = 0;
    $count = 0;
    foreach ($scores as $score) {
	$total += $score['Score'];
	$count += 1;
    }

    return round(($total/$count), 1);
}

function updateAverageScore($id) {
    global $conn;

    $avg = getAverageScore($id);
    $stmt = $conn->prepare('UPDATE Restaurant SET AverageScore = ? WHERE Id = ?');
    $stmt->execute(array($avg, $id));
}

function getHighestScoredRestaurants($num) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM Restaurant ORDER BY AverageScore DESC LIMIT ?');
    $stmt->execute(array($num));

   return $stmt->fetchAll();
}


?>

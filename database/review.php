<?php

class Review {    
    public function createReview($restaurant, $comment, $score) {
	global $conn;
	
	$stmt = $conn->prepare('INSERT INTO Review(Restaurant, Comment, Score) VALUES (?, ?, ?)');
	$stmt->execute(array($restaurant, $comment, $score));
    }

    public function updateReview($id, $score) {
	global $conn;

	$stmt = $conn->prepare('UPDATE Review SET Score=? WHERE Id=?');
	$stmt->execute(array($score, $id));
    }

    public function deleteReview($id) {
	global $conn;

	$stmt = $conn->prepare('DELETE FROM Review WHERE Id=?');
	$stmt->execute(array($id));
    }
    
    public function printReviewHead($review) {
	global $conn;

	$stmt = $conn->prepare('SELECT Person.FirstName, Person.LastName, Person.Username, Comment.Timestamp FROM Person, Comment, Review WHERE Review.Id = ? AND Comment.Id = Review.Comment AND Person.Id = Commenter');
	$stmt->execute(array($review['Id']));
	
	$person = $stmt->fetchAll();	
	
	echo '<p><a href="user_page.php?username=' . $person[0]['Username'] .'">' . $person[0]['FirstName'] . ' ' . $person[0]['LastName'] . '</a> ' . $review['Score'] . ' ' . $person[0]['Timestamp'] . ' ';
    }
    
    public function getRestaurantName($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT * FROM Review, Restaurant WHERE Review.Id = ? AND Restaurant.Id = Review.Restaurant');
	$stmt->execute(array($id));
	
	$name = $stmt->fetch();	
	
	return $name['Name'];
    }
    
    public function getScore($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT * FROM Review WHERE Review.Id = ?');
	$stmt->execute(array($id));
	
	$name = $stmt->fetch();	
	
	return $name['Score'];
    }
    
    public function getReviewerFirstName($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT Person.FirstName FROM Person, Comment, Review WHERE Review.Id = ? AND Comment.Id = Review.Comment AND Person.Id = Commenter');
	$stmt->execute(array($id));
	
	$person = $stmt->fetchAll();	
	
	return $person[0]['FirstName'];
    }
    
    public function getReviewerLastName($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT Person.LastName FROM Person, Comment, Review WHERE Review.Id = ? AND Comment.Id = Review.Comment AND Person.Id = Commenter');
	$stmt->execute(array($id));
	
	$person = $stmt->fetchAll();	
	
	return $person[0]['LastName'];
    }
    
    public function getReviewComment($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT Comment.Text FROM Comment, Review WHERE Review.Id = ? AND Comment.Id = Review.Comment');
	$stmt->execute(array($id));
	
	$person = $stmt->fetchAll();	
	
	return $person[0]['Text'];
    }
    
    public function getComments($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT Comment.Id FROM Comment, Review WHERE Review.Id = ? AND Comment.Parent = Review.Comment');
	$stmt->execute(array($id));
	
	$comment = $stmt->fetchAll();	
	
	return $comment;
    }
    
    public function getComment($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT Comment FROM Review WHERE Id = ?');
	$stmt->execute(array($id));
	
	$comment = $stmt->fetchAll();	
	
	return $comment[0]['Comment'];
    }

    public function getReviewer($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT Comment.Commenter FROM Comment, Review WHERE Review.Id = ? AND Review.Comment = Comment.Id');
	$stmt->execute(array($id));

	$reviewer = $stmt->fetch();
	return $reviewer['Commenter'];
    }

    public function getTimestamp($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT Timestamp FROM Comment, Review WHERE Review.Id = ? AND Review.Comment = Comment.Id');
	$stmt->execute(array($id));

	$timestamp = $stmt->fetch();
	return $timestamp['Timestamp'];
    }

    public function getRestaurant($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT Restaurant FROM Review WHERE Review.Id = ?');
	$stmt->execute(array($id));

	$restaurant = $stmt->fetch();
	return $restaurant['Restaurant'];
    }

    public function getAllReviewsFromPerson($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT Review.Id, Review.Score FROM Review, Comment, Person WHERE Person.Id = ? AND Person.Id = Comment.Commenter AND Review.Comment = Comment.Id');
	$stmt->execute(array($id));

	return $stmt->fetchAll();
    }

    public function getLatestReviews($num) {
	global $conn;

	$stmt = $conn->prepare('SELECT * FROM Review, Comment WHERE Review.Comment = Comment.Id ORDER BY Comment.Timestamp DESC LIMIT ?');
	$stmt->execute(array($num));

	return $stmt->fetchAll();
    }
}

?>

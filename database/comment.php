<?php

class Comment {
    public function createComment($commenter, $parent, $text) {
	global $conn;

	$stmt = $conn->prepare('INSERT INTO Comment(Commenter, Parent, Text) VALUES (?, ?, ?)');
	$stmt->execute(array($commenter, $parent, $text));
	
	return $conn->lastInsertId();
    }
	
	public function createReviewComment($commenter, $text) {
	global $conn;

	$stmt = $conn->prepare('INSERT INTO Comment(Commenter, Text) VALUES (?, ?)');
	$stmt->execute(array($commenter, $text));
	
	return $conn->lastInsertId();
    }

    public function updateComment($id, $text) {
	global $conn;

	$stmt = $conn->prepare('UPDATE Comment SET Text=? WHERE Id=?');
	$stmt->execute(array($text, $id));
    }

    public function deleteComment($id) {
	global $conn;

	$stmt = $conn->prepare('DELETE FROM Comment WHERE Id=?');
	$stmt->execute(array($id));
    }   
	
	public function getComment($id) {
	global $conn;

	$stmt = $conn->prepare('SELECT * FROM Comment WHERE Id=?');
	$stmt->execute(array($id));
	
	return $stmt->fetchAll();
    }   
	
	public function printComment($id, $reviewid, $ownerid) {
		global $conn;

		$stmt = $conn->prepare('SELECT Person.FirstName, Person.LastName, Person.Username, Person.Id, Timestamp, Text FROM Person, Comment WHERE Comment.Id=? AND Person.Id = Comment.Commenter');
		$stmt->execute(array($id));
		
	    $comment = $stmt->fetchAll();

	    echo '<p><a href="user_page.php?username=' . $comment[0]['Username']. '">' . $comment[0]['FirstName'] . ' ' . $comment[0]['LastName'] . '</a> ' . $comment[0]['Timestamp'];
	    if ($comment[0]['Id'] == $ownerid) {
		echo ' [owner] </p>';
	    } else {
		echo '</p>';
	    }
	    
		echo '<p>' . $comment[0]['Text'] . ' ';
		
		$stmt2 = $conn->prepare('SELECT Id FROM Comment WHERE Parent = ?');
		$stmt2->execute(array($id));
		
		if (isset($_SESSION['id'])) {
			?><a href="reply_page.php?review=<?=$reviewid?>&comment=<?=$id?>">Reply</a></p><?php
		}
		
		$comments = $stmt2->fetchAll();
		
		foreach($comments as $com)
		{
			echo "</p>";
			Comment::printComment($com['Id'], $reviewid, $ownerid);
		}
    }  
	
	public function printCommentOnly($id) {
		global $conn;

		$stmt = $conn->prepare('SELECT Person.FirstName, Person.LastName, Person.Username, Timestamp, Text FROM Person, Comment WHERE Comment.Id=? AND Person.Id = Comment.Commenter');
		$stmt->execute(array($id));
		
		$comment = $stmt->fetchAll();
													
		echo '<p><a href="user_page.php?username=' . $comment[0]['Username']. '">' . $comment[0]['FirstName'] . ' ' . $comment[0]['LastName'] . '</a> ' . $comment[0]['Timestamp'] . '</p>';
		echo '<p>' . $comment[0]['Text'] . '</p>';
    }  
}

?>

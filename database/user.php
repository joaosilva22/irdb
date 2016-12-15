<?php

function createUser($username, $password, $email, $firstname, $lastname, $type) {
    global $conn;
    
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare('INSERT INTO Person(Username, Hash, Email, FirstName, LastName, Type) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($username, $hash, $email, $firstname, $lastname, $type));
}

function verifyUser($username, $password) {
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM Person WHERE Username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();
    return ($user !== false && password_verify($password, $user['Hash']));
}

function validateUsername($username){
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM Person WHERE Username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();

    return $user === false ;
}

function getUserId($username) {
    global $conn;

    $stmt = $conn->prepare('SELECT Id FROM Person WHERE Username = ?');
    $stmt->execute(array($username));

    $id = $stmt->fetch();
    return $id['Id'];
}

function updateFirstName($firstname, $id) {
    global $conn;

    $stmt = $conn->prepare('UPDATE Person SET FirstName = ? Where ID = ?');
    $stmt->execute(array($firstname, $id));
}

function updateLastName($lastname, $id) {
    global $conn;

    $stmt = $conn->prepare('UPDATE Person SET LastName = ? Where ID = ?');
    $stmt->execute(array($lastname, $id));
}

function updateBio($bio, $id) {
    global $conn;

    $stmt = $conn->prepare('UPDATE Person SET Bio = ? Where Id = ?');
    $stmt->execute(array($bio, $id));
}

function updateEmail($email, $id) {
    global $conn;

    $stmt = $conn->prepare('UPDATE Person SET Email = ? Where Id = ?');
    $stmt->execute(array($email, $id));
}

function updatePassword($password, $id) {
    global $conn;
    
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare('UPDATE Person SET Hash = ? WHERE Id = ?');
    $stmt->execute(array($hash, $id));
}

function updatePhoto($photoId, $id){
    global $conn;

    $stmt = $conn->prepare('UPDATE Person SET Photo = ? WHERE Id = ?');
    $stmt->execute(array($photoId, $id));
}

function getPhoto($id){
    global $conn;
    $stmt = $conn->prepare('SELECT Photo From Person WHERE Id = ?');
    $stmt->execute(array($id));

    $photoId = $stmt->fetch();

    return $photoId['Photo'];
}

function getUsername($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Username FROM Person WHERE Id = ?');
    $stmt->execute(array($id));

    $username = $stmt->fetch();
    return $username['Username'];
}

function getUserType($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Type FROM Person WHERE Id = ?');
    $stmt->execute(array($id));

    $type = $stmt->fetch();
    return $type['Type'];
}

function getFirstName($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT FirstName FROM Person WHERE Id = ?');
    $stmt->execute(array($id));

    $firstname = $stmt->fetch();
    return $firstname['FirstName'];
}

function getLastName($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT LastName FROM Person WHERE Id = ?');
    $stmt->execute(array($id));

    $lastname = $stmt->fetch();
    return $lastname['LastName'];
}

function getUserFullName($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT FirstName, LastName FROM Person WHERE Id = ?');
    $stmt->execute(array($id));

    $fullname = $stmt->fetch();
    return $fullname['FirstName'] . ' ' . $fullname['LastName'];
}

function getEmail($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Email FROM Person WHERE Id = ?');
    $stmt->execute(array($id));

    $email = $stmt->fetch();
    return $email['Email'];
}

function getBio($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Bio FROM Person WHERE Id = ?');
    $stmt->execute(array($id));

    $bio = $stmt->fetch();
    return $bio['Bio'];
}

function hasRestaurants($id) {
    //TO DO: Add restaurants to user
    return false;
}

function isOwner($id) {
	global $conn;

    $stmt = $conn->prepare('SELECT Type FROM Person WHERE Id = ?');
    $stmt->execute(array($id));

    $type = $stmt->fetch();
    return $type['Type'] == 'Owner';
}

function isReviewer($id) {
	global $conn;

    $stmt = $conn->prepare('SELECT Type FROM Person WHERE Id = ?');
    $stmt->execute(array($id));

    $type = $stmt->fetch();
    return $type['Type'] == 'Reviewer';
}

function getUser($id) {
	global $conn;

    $stmt = $conn->prepare('SELECT * FROM Person WHERE Id = ?');
    $stmt->execute(array($id));

    return $stmt->fetch();
}
?>

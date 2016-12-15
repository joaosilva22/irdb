<?php

function getImagePath($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT Id, Extension FROM Image WHERE Id = ?');
    $stmt->execute(array($id));

    $image = $stmt->fetch();
    return $image['Id'] . '.' . $image['Extension'];
}

?>

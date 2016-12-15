<?php

session_start();

define('DB_PATH', 'ir.db');

$conn = new PDO('sqlite:ir.db');
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

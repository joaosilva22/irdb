<?php
	session_start();
	$conn = new PDO('sqlite:../ir.db');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

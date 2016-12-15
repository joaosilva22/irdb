<?php
  include($_SERVER['DOCUMENT_ROOT'] . '/config/init.php');
  include($_SERVER['DOCUMENT_ROOT'] . '/database/user.php');

  include($_SERVER['DOCUMENT_ROOT'] . '/database/upload.php');

  $id = uploadImage();
  updatePhoto($id, $_SESSION['id']);
  
  header("Location: ../edit_image.php");
?>
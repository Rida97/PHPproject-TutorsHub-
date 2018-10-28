<?php

session_start();

$username=$_SESSION['username'];
  echo "You have been logged in  ".$username;
  
?>

<html>

<link rel="stylesheet" href="form.css" type="text/css">

<div class="body-content">
    <div class="module"></div>
</div>
</html>
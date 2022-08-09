<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="admin_login";


$mysqli = new mysqli($servername,$username,$password,$db_name);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

?>
<?php
include_once "env.php";

date_default_timezone_set('Asia/Manila');

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
$conn2 = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  //die("Connection failed: " . $conn->connect_error);
  //redirect to database setup connection
  header("Location:./layout/configure.php");
}
?>
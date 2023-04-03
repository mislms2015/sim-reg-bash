<?php
include_once "../config/env.php";

/**
 * redirecting here for the first time use or when database from .env is change
 */

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE $database";
if ($conn->query($sql) === TRUE) {
  $msg = "Database created successfully.";
  $msg_clr = "green";
} else {
  $msg = "Error creating database: " . $conn->error;
  $msg_clr = "red";
}

$conn->close();

echo json_encode(
    array(
        "res" => "success",
        "msg" => $msg,
        "msg_clr" => $msg_clr
        )
);

?>
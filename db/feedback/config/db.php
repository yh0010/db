<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'hw3');

// Create connection
$conn = new mysqli(DB_HOST, 'elaina2','123123', DB_NAME);

// Check connection
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

//echo 'Connected successfully';
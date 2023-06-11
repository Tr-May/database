<?php

// Establish a connection
$conn = mysqli_connect("localhost", "root", "", "php-crud");

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// echo "connected successfully!";

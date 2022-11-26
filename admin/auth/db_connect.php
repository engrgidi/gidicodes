<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = 'gidicodes';

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// $password = md5('C');
// $sql = "INSERT INTO admin (admin_name, admin_email, password) VALUES ('Okoene Maxwell', 'giditech001@gmail.com', '$password')";
// $conn->query($sql);

?>
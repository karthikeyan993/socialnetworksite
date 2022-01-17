<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$logindata=json_decode(file_get_contents('php://input'),true);

$json_array = array();
$row = array();
$sql = "SELECT * FROM user Where email='$logindata[email]' and password='$logindata[pass]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "true";
  
  $row = $result->fetch_assoc();
  $_SESSION['user']=$row['id'];
} else {
  echo "false";
}

$conn->close();

;
?>
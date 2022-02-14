<?php
session_start();
$currentuser = $_SESSION['user'];
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

  $comjson=json_decode(file_get_contents('php://input'), true);
  $cominput = $comjson['input'];
  $compost = $comjson['commsg'];

 // if($textpost['type']=="insert"){
    $sql = "INSERT INTO comment (`userid`, `postid`, `commment`) VALUES ($currentuser,'$compinput','$compost')";
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  //}
  


  
$conn->close();

?>
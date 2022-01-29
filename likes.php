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

  $likepost=json_decode(file_get_contents('php://input'), true);
  $tempmsg = $likepost['likemsg'];
  $optype = $likepost['type'];
  if($optype=="insert"){
    $sql = "INSERT INTO likes (`userid`, `postid`) VALUES ('$currentuser','$tempmsg')";
    if ($conn->query($sql) === TRUE) {
      echo json_encode(array("success"=>"created successfully"));
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else if ($optype=="delete") {

    $sql = "DELETE FROM likes WHERE userid=$currentuser AND postid=$tempmsg";
    if ($conn->query($sql) === TRUE) {
      echo "Delete successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }
    
 
  


  
$conn->close();

?>
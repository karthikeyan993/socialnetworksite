<?php
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

  $textpost=json_decode(file_get_contents('php://input'), true);

 // if($textpost['type']=="insert"){
    $sql = "INSERT INTO post (`userid`, `posttype`, `textpost`) VALUES ('1','1','$textpost[name]')";
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  //}
  


  
$conn->close();

?>
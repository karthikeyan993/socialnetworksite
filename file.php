<?php
session_start();
$currentuser = $_SESSION['user'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$container="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $receiveuser=json_decode(file_get_contents('php://input'), true);
// echo $POST['user'];
$json_array = array();
$sql = "SELECT userid, posttype, textpost, imagedescrip, imagelink, pollque, option1, option2, option3, option4,likes,user.firstname,user.lastname,user.location,user.userphoto FROM post
INNER JOIN user
WHERE userid=user.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row['userid']==$currentuser){
      $json_array[]=$row;
    }
     
  }

} else {
  echo "0 results";
}

echo json_encode($json_array);

$conn->close();

;
?>
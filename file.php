<?php
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
$json_array = array();
$sql = "SELECT * FROM post";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $json_array[]=$row;
  }

} else {
  echo "0 results";
}

echo json_encode($json_array);

$conn->close();

;
?>
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
$comment_array=array();


// $comment="SELECT userid,postid,comment FROM comment";
// $cresult = $conn->query($comment);
// if ($cresult->num_rows > 0) {
//   // output data of each row
//   while($row = $cresult->fetch_assoc()) {
//       $comment_array['user']=$row['userid'];
//       $comment_array['postid']=$row['postid'];
//       $comment_array['text']=$row['comment'];
//   }
  
// } else {
//     echo "0 results";
// }


$sql = "SELECT userid, postid,posttype, textpost, imagedescrip, imagelink, pollque, option1, option2, option3, option4,likes,user.firstname,user.lastname,user.location,user.userphoto, (SELECT likes.userid FROM likes WHERE post.postid IN (postid)) AS likeduser,(SELECT COUNT(likes.postid) FROM likes WHERE likes.postid=post.postid) AS postlikes FROM post
INNER JOIN user
WHERE userid=user.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row['userid']==$currentuser){
          // foreach($comment_array as $value){
          //   json_decode($value);
          //   if($row['postid']==$comment_array['postid']){
          //     $row['comments']=$value["userid"];
          //   }
          // }
          $row['comments']=json_decode('[{"userid":1,"postid":151,"text":"This is comment"},{"userid":3,"postid":151,"text":"This is 2nd comment"}]');
          $json_array[]=$row;

      }  
    }
  } else {
      echo "0 results";
  }




echo json_encode($json_array);

$conn->close();
?>
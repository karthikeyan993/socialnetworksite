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

$sql = "SELECT * FROM post";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      if($row['posttype']==1 && $row['textpost']!=""){
        echo '<div class="box1">
        <div class="box1head">
            <div class="box1dp">
                <img src="./resources/images/profilephoto.jpg" alt="Profile Photo">
            </div>
            <div class="box1name">
                <p id="box1dpname">James Speigel</p>
                <p id="box1time">19 hours ago</p>
            </div>
            <div class="box1dummy">

            </div>
            <div class="box1dot">
                <p>...</p>
            </div>
        </div>
        <div class="box1post">
            <p>'.$row['textpost'].'</p>
        </div>
        <div class="box1foot">
            <div class="box1heart">
                <ion-icon class="heart"name="heart-outline"></ion-icon>
            </div>
            <div class="box1likes">
                <p>25</p>
            </div>
            <div class="box1frndspic">
                <img id="friend1" src="./resources/images/stranger1.jpg" alt="Friend photo">
                <img id="friend2" src="./resources/images/stranger2.jpg" alt="Friend photo">
                <img id="friend3" src="./resources/images/stranger3.jpg" alt="Friend photo">
                <img id="friend4" src="./resources/images/stranger4.jpg" alt="Friend photo">
                <img id="friend5" src="./resources/images/stranger5.jpg" alt="Friend photo">
            </div>
            <div class="box1frndsname">
                <p><b>Jenny</b>, <b>Robert</b> and<br> 6 more liked this</p>
            </div>
            <div class="box1footdum">
            </div>
            <div class="box1noti">
                <div class="box1comm">
                    <ion-icon class="box1chat"name="chatbox-ellipses-outline"></ion-icon>
                    <p class="comnum">17</p>
                </div>
                <div class="box1share">
                    <ion-icon class="box1chat" name="trail-sign-outline"></ion-icon>
                    <p class="comnum">24</p>
                </div>
            </div>
        </div>
    </div>';
      } elseif($row['posttype']==2 && $row['imagelink']!="") {
            echo '
            <div class="box2">
            <div class="box1head">
                <div class="box1dp">
                    <img src="./resources/images/profilephoto.jpg" alt="Profile Photo">
                </div>
                <div class="box1name">
                    <p id="box1dpname">James Speigel</p>
                    <p id="box1time">19 hours ago</p>
                </div>
                <div class="box1dummy">

                </div>
                <div class="box1dot">
                    <p>...</p>
                </div>
            </div>
            <div class="box2post">
                <div class="descrip">
                    <p>'.$row['imagedescrip'].'</p>
                </div>
                <div class="imgpost">
                    <img src="'.$row['imagelink'].'" alt="Girl Photo">
                </div>
            </div>
            <div class="box1foot">
                <div class="box1heart">
                    <ion-icon class="heart"name="heart-outline"></ion-icon>
                </div>
                <div class="box1likes">
                    <p>25</p>
                </div>
                <div class="box1frndspic">
                    <img id="friend1" src="./resources/images/stranger1.jpg" alt="Friend photo">
                    <img id="friend2" src="./resources/images/stranger2.jpg" alt="Friend photo">
                    <img id="friend3" src="./resources/images/stranger3.jpg" alt="Friend photo">
                    <img id="friend4" src="./resources/images/stranger4.jpg" alt="Friend photo">
                    <img id="friend5" src="./resources/images/stranger5.jpg" alt="Friend photo">
                </div>
                <div class="box1frndsname">
                    <p><b>Jenny</b>, <b>Robert</b> and<br> 6 more liked this</p>
                </div>
                <div class="box1footdum">
                </div>
                <div class="box1noti">
                    <div class="box1comm">
                        <ion-icon class="box1chat"name="chatbox-ellipses-outline"></ion-icon>
                        <p class="comnum">17</p>
                    </div>
                    <div class="box1share">
                        <ion-icon class="box1chat" name="trail-sign-outline"></ion-icon>
                        <p class="comnum">24</p>
                    </div>
                </div>
            </div>
        </div>
            ';
      } elseif($row['posttype']==3 && $row['pollque']!="" && $row['option1']!="" && $row['option2']!="") {
        echo '<div class="box3">
        <div class="box1head">
            <div class="box1dp">
                <img src="./resources/images/profilephoto.jpg" alt="Profile Photo">
            </div>
            <div class="box1name">
                <p id="box1dpname">James Speigel</p>
                <p id="box1time">19 hours ago</p>
            </div>
            <div class="box1dummy">

            </div>
            <div class="box1dot">
                <p>...</p>
            </div>
        </div>
        <div id="poll" class="box3post">
                <div class="que">
                    <p>'.$row['pollque'].'</p>
                </div>
                <div class="options">
                    <input type="radio" id="option1" checked="checked" name="answer">
                    <label for="option1">'.$row['option1'].'</label><br>
                    <input type="radio" id="option2" name="answer">
                    <label for="option2">'.$row['option2'].'</label><br>
                    <input type="radio" id="option3" name="answer">
                    <label for="option3">'.$row['option3'].'</label><br>
                    <input type="radio" id="option4" name="answer">
                    <label for="option4">'.$row['option4'].'</label>
                </div>
                <div class="submit">
                    <button id="submitbtn" onclick="result()">Submit</button>
                </div>
        </div>
        <div class="box1foot">
            <div class="box1heart">
                <ion-icon class="heart"name="heart-outline"></ion-icon>
            </div>
            <div class="box1likes">
                <p>25</p>
            </div>
            <div class="box1frndspic">
                <img id="friend1" src="./resources/images/stranger1.jpg" alt="Friend photo">
                <img id="friend2" src="./resources/images/stranger2.jpg" alt="Friend photo">
                <img id="friend3" src="./resources/images/stranger3.jpg" alt="Friend photo">
                <img id="friend4" src="./resources/images/stranger4.jpg" alt="Friend photo">
                <img id="friend5" src="./resources/images/stranger5.jpg" alt="Friend photo">
            </div>
            <div class="box1frndsname">
                <p><b>Jenny</b>, <b>Robert</b> and<br> 6 more liked this</p>
            </div>
            <div class="box1footdum">
            </div>
            <div class="box1noti">
                <div class="box1comm">
                    <ion-icon class="box1chat"name="chatbox-ellipses-outline"></ion-icon>
                    <p class="comnum">17</p>
                </div>
                <div class="box1share">
                    <ion-icon class="box1chat" name="trail-sign-outline"></ion-icon>
                    <p class="comnum">24</p>
                </div>
            </div>
        </div>
    </div>';
      }
    
  }
  
  
} else {
  echo "0 results";
}
$conn->close();

;
?>
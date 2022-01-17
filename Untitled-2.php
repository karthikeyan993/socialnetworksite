$sql = "INSERT INTO user (`firstname`, `secondname`, `location`, `textpost`, `imagedescrip`, `imagelink`, `pollquestion`, `option1`, `option2`, `option3`, `option4`, `userpicture`, `posttype`) 
VALUES ('Mike','Adams','New York City',
 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex voluptate illum accusamus quod amet sapiente commodi veritatis atque deserunt, optio dignissimos delectus sint, ipsum mollitia deleniti dolorum doloribus libero. Ducimus error tempora ad repellendus soluta quisquam similique, officia quam aut?',
 'This photo was taken when we visited to Paris! one of my favourite click',
 'http://localhost/socialnetwork/resources/images/girl.jpg',
 'Is Climate Change real?!',
 'Climate Change is real, immediate action needed',
 'Climate Change is real, no need to alarm',
 'Climate Change isn\'t real',
 'No comments',
 'http://localhost/socialnetwork/resources/images/profilephoto.jpg',
 '1')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
<?php
//echo "hi";
//var_dump($_GET['offset']);
/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST['name']);
     collect value of input field
    $name = $_POST['offset'];
     if (empty($name)) {
        echo "please enter a text";
    } else {
        echo $name;
    } 
} */

$data = json_decode(file_get_contents('php://input'), true);
var_dump($data);
// var_dump($_POST);

?>

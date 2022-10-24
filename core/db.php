<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "flashcard";

$conn = mysqli_connect($host, $user, $password, $dbname);
if($conn){
    
} else {
   die("Failed" . $mysqli_connect_error());
}

function redirect($page){
   header("Location: $page");
}

?>
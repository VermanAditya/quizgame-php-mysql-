<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

// DB connection
$con = mysqli_connect('localhost','root');
if ($con) {
    echo "Yes";
}
else{
    echo "no";
}
mysqli_select_db($con,'quizdb');

$name = $_POST['user'];
$pass = $_POST['password'];

$q = "Select * from singnin where name= '$name' && password = '$pass' ";

$result = mysqli_query($con, $q);

$num = 0;

$num = mysqli_num_rows($result);
if($num == 0){
    header('location:index.php');    
} 
else{
    $_SESSION['username'] = $name;
    header('location:homepage.php');
}
?>



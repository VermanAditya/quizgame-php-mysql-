<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
header('location:index.php');

// DB connection
$con = mysqli_connect('localhost','root');
if ($con) {
    echo "Connections Successfull";
}
else{
    echo "no";
}
mysqli_select_db($con,'quizdb');

$name = $_POST['user'];
$pass = $_POST['password'];

$q = "Select * from singnin where name= '$name' && password = '$pass' ";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);
if($num == 1){
    echo "Duplicate Data";
}
else{
    $query = "insert into singnin(name,password) values('$name','$pass')";
    mysqli_query($con,$query);
}
?>



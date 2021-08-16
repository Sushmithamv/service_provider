<?php
// <!-- database info -->
$server_name = "localhost";
$user_name = "root";
$password = "";
$db = "service_provider";


// <!-- establish connection -->

$con = new mysqli($server_name,$user_name,$password,$db);

// <!-- check connection -->
if($con->connect_error){
    die("Connection failed".$con->connect_error);
} else{
     echo "successfully connected";
}
?>
<?php

$user = "root";
$password = "";
$servername = "localhost";
$db="quiz";

$con=mysqli_connect($servername,$user,$password,$db);

if($con){
   
    
}else{
    die("no connection".mysqli_connect_error());
}


?>
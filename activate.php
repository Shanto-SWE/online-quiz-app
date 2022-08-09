<?php
session_start();
include 'connect.php';

if(isset($_GET['token'])){


    $token=$_GET['token'];
    $updatequery="update students set status='active' where token='$token'";

    $query=mysqli_query($con,$updatequery);
    if($query){

        if(isset($_SESSION['mag'])){
            $_SESSION['mag']="please enter your email and password";
            header('location:signin.php');
        }else{
            $_SESSION['mag']="You are logout.please login again";
            header('location:signin.php');
        }
    }
    else{
        $_SESSION['mag']="Account not updated";
        header('location:signup.php');
    }
}
else{
    ?>
    <script>alert("Account not updated")</script>
    <?php
}

?>
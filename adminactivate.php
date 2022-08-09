<?php
session_start();
include 'connect.php';

if(isset($_GET['admintoken'])){


    $token=$_GET['admintoken'];
    $updatequery="update teacher set status='active' where token='$token'";

    $query=mysqli_query($con,$updatequery);
    if($query){

        if(isset($_SESSION['mag'])){
            $_SESSION['mag']="please enter your email and password";
            header('location:adminsigninpage.php');
        }else{
            $_SESSION['mag']="You are logout.please login again";
            header('location:adminsigninpage.php');
        }
    }
    else{
        $_SESSION['mag']="Account not updated";
        header('location:adminsignup.php');
    }
}
else{
    ?>
    <script>alert("Account not updated")</script>
    <?php
}

?>
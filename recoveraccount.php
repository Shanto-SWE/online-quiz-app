
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Recover Account</title>
    <link rel="stylesheet" href="css/resetpassword.css">
    <style>
        input{
            outline:none;
        }
    </style>
</head>
<body class="align">
  <div class="login">
    <header class="login__header">
      <h2>
        Recover Account</h2>
    </header>
    <form action="#" class="login__form" method="POST">
      <div>
        <input type="email" id="email" name="email" placeholder="Enter your email">
      </div>
      <div>
        <input class="button" type="submit" name="submit" value="SENT MAIL">
      </div>
    </form>
    <p> Don't have an account?<a href="signin.php">signin</a></p>

  </div>



</body>
</html>


<?php

include 'connect.php';

if(isset($_POST['submit'])){

$email=mysqli_real_escape_string($con,$_POST['email']);


$emailquery="select * from students where email='$email'";

$query=mysqli_query($con,$emailquery);

$countemail=mysqli_num_rows($query);
if($countemail){

    $data=mysqli_fetch_array($query);

    $username=$data['name'];
    $token=$data['token'];
    
            $subject = "Password reset";
            $body = "Hi,$username.click here too reset your password
            http://localhost/registraction%20form/resetpassword.php?token=$token ";
            $headers = "From:shantoahmeddiu@gmail.com";
            
            
            if (mail($email, $subject, $body, $headers)) {
               $_SESSION['mag']="please check your email and reset your password $email";
               header('location:signin.php');
            } else {
                echo "Email sending failed...";
            }
        
    }else{
        ?>
    <script>alert("No email found")</script>
    <?php 
    }






}
?>
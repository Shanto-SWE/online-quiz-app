<?php

session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link rel="stylesheet" href="css/resetpassword.css">

    <style>

p{
    color:black;
    

}
    </style>
</head>
<body class="align">

  <div class="login">

    <header class="login__header">
      <h2>
        Update password</h2>
  
    </header>
<p><?php 
if(isset($_SESSION['passmag'])){
    echo $_SESSION['passmag'];
}else{
    echo $_SESSION['passmag']="";
}
?></p>
    <form action="#" class="login__form" method="POST">
      <div>
        <input type="password" id="email" name="newpass" placeholder="New password" required>
      </div>
      <div>
        <input type="password" id="email" name="cpass" placeholder="Confirm password" required>
      </div>
      <div>
        <input class="button" type="submit" name="submit" value="Update Password">
      </div>

    </form>
    <p>Have an account?<a href="signup.php">login</a></p>

  </div>

  

</body>
</html>


<?php

include 'connect.php';

if(isset($_POST['submit'])){
    if(isset($_GET['token'])){

        $token=$_GET['token'];

            $newpass=mysqli_real_escape_string($con,$_POST['newpass']);
            $cpass=mysqli_real_escape_string($con,$_POST['cpass']);

            $str_pass=password_hash($newpass,PASSWORD_BCRYPT);
            $str_cpass=password_hash($cpass,PASSWORD_BCRYPT);



    if($newpass===$cpass){

      $updatequery="update students set password='$str_pass' where token='$token'";


        $query=mysqli_query($con,$updatequery);
            
                if($query){
                    $_SESSION['mag']="Your password has been updated";
                    header('location:signin.php');
            
                }else{

                $_SESSION['passmag']="Your password has not updatd";
                header('location:resetpassword.php');
                }

            }else{
             
            
                $_SESSION['passmag']="password is not matching";
            }
        }
        else{
            ?>
            <script>alert("no token found")</script>
            <?php
        }

        }
        

?>
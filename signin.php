

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
    <title>Sign in</title>


    <?php   include './link.php'?>
    <link rel="stylesheet" href="css/form.css">

<style>
p{
    color: #0f5132;
    background-color: #d1e7dd;
    border-color: #badbcc;
    font-size:20px;
}
</style>
</head>
<body>

<section class="signin">
<div class="container">
<div class="row">
<div class="col-lg-7 col-md-7 col-12 ">
<h2 class="form-title">Please Signin</h2>
                        <p class="massage text-center">
                        
                        <?php
                        if(isset($_SESSION['mag'])){
                            echo $_SESSION['mag'];
                        }else{
                            echo $_SESSION['mag']="You are logout.please login again.";
                        }
                        
                        ?>
                        </p>
                        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Enter your email" required value="<?php if(isset($_COOKIE['emailcookie'])){
                                echo $_COOKIE['emailcookie'];}?>"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password" required value="<?php if(isset($_COOKIE['passwordcookie'])){
                                echo $_COOKIE['passwordcookie'];}?>"/>
                            </div>
                          
                            <div class="mt-4 mb-3">
                                <input type="checkbox" name="rememberme" id="signin" class="form-submit rememberme" value="Log in"/><span class="rememberme">Remember me</span>
                            </div>
                            <a href="recoveraccount.php">Forgot password</a>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" value="Log in"/>
                            </div>
                            
                                                </form>
                                                <a href="signup.php" class="signup-image-link">Create account here</a><br>
                        </div>
                        <div class="col-lg-5 col-md-5 col-12 ">
                        <div class="signin-image">
                        <figure><img src="https://pngimg.com/uploads/student/student_PNG62545.png" class="signupanimation img-fluid" width=400 height=400 alt="sing up image"></figure>
                      
                    
                         
                    </div>

</div>

</div>
</div>

</section>

</body>
</html>

<?php
include 'connect.php';

if(isset($_POST['submit'])){


    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $email_serch="select * from students where email='$email' and status='active'";

    $query=mysqli_query($con,$email_serch);
    $email_count=mysqli_num_rows($query);

    if($email_count){

        $email_pass=mysqli_fetch_array($query);
        $db_pass=$email_pass['password'];

        $_SESSION['username']=$email_pass['name'];


        $decode_pass=password_verify($pass,$db_pass);
        if($decode_pass){
            ?>
            <script>alert("login sueccssfully")
            </script>
            
            <?php
               if(isset($_POST['rememberme'])){
                setcookie('emailcookie',$email,time()+86400);
                setcookie('passwordcookie',$pass,time()+86400);
                 header('location:main.php');
              }else{
                header('location:main.php');
              }
        }
        else{
            ?>
            <script>alert("Incorrect password")</script>
            <?php
        }
    }
    else{
        ?>
            <script>alert("Email is not activated")</script>
            <?php
    }




}


?>

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
    <title>Signup page</title>
    
    <?php   include 'link.php'?>
    <link rel="stylesheet" href="css/form.css">
    
</head>
<body>
    <section class="signup">
   
        <div class="container">
     
            <div class="row mt-5">
                <div class="col-lg-7 col-md- col-12 text-center ">
                <h2 class="form-title">Student Signup Page</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder=" Enter Your full Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder=" Enter Your Email" required/>
                            </div>
                           
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group">
                                <input type="file" name="photo"   required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Register"/>
                            </div>

                        </form>
                        <div class="already">
                            <span>Already Register?<a href="signin.php">Login</a></span>
                            <br>
                             <span>Back TO <a href="userhomepage.php">HOME</a></span>
                        </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12 text-center">
                <div class="signup-image">
                        <figure><img src="https://www.advertiser.ie/images/2014/11/73621.jpg" class="signupanimation img-fluid" width=350 height=350 alt="sing up image"></figure>
                         
                    
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

$name=mysqli_real_escape_string($con,$_POST['username']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$pass=mysqli_real_escape_string($con,$_POST['pass']);
$cpass=mysqli_real_escape_string($con,$_POST['re_pass']);
$file=($_FILES['photo']);

// print_r($file);
$str_pass=password_hash($pass,PASSWORD_BCRYPT);
$str_cpass=password_hash($cpass,PASSWORD_BCRYPT);

$filename=$file['name'];
$filepath=$file['tmp_name'];
$fileerror=$file['error'];

// file validation
$file_ext=explode(".",$filename);

$check_ext=strtolower(end($file_ext));

$valid_file_ext=array("jpg","jpeg"); 




$token=bin2hex(random_bytes(15));

$emailquery="select * from students where email='$email'";

$query=mysqli_query($con,$emailquery);

$countemail=mysqli_num_rows($query);
if($countemail>0){
    ?>
    <script>alert("Email alredy exits")</script>
    <?php 

}else{
    if($pass===$cpass){

        if($fileerror==0){
            if(in_array($check_ext,$valid_file_ext)){

                $destfile='upload/'.$filename;
                move_uploaded_file($filepath,$destfile);
            
    
            $insetquery="insert into students( name, email, password, cpassword,token,status,pic) VALUES ('$name','$email','$str_pass','$str_cpass','$token','inactive','$destfile')";
    
    
            $query=mysqli_query($con,$insetquery);
            
            if($query){
    
                $subject = "Email Activation";
                $body = "Hi,$name.click here too active your account
                http://localhost/Online%20quiz%20app/activate.php?token=$token ";
                $headers = "From:shantoahmeddiu@gmail.com";
                
                
                if (mail($email, $subject, $body, $headers)) {
                   $_SESSION['mag']="please check your email and activate your account $email";
                   header('location:signin.php');
                } else {
                    echo "Email sending failed...";
                }
            }else{
                ?>
                <script>alert("Data not inserted")</script>
                <?php
            } 
        }else{
            ?>
            <script>alert("file extension is not valid")</script>
            <?php 
        } 
    
    }else{
                ?>
                <script>alert("file is not upload")</script>
             <?php 
            }
        }else{
        ?>
    <script>alert("password is not matching")</script>
    <?php 
    }
}
}else{
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update form</title></title>
    
    <?php   include 'link.php'?>
</head>
<body>
    
    <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register for Web Developer job</h2>
                        <form method="POST" class="register-form" id="register-form">

                                                <?php

                        include 'connect.php';

                        $ids=$_GET['id'];

                        $showquery="select * from user where id={$ids}";

                        $showdata=mysqli_query($con,$showquery);

                        $result=mysqli_fetch_array($showdata);
                        


                        if(isset($_POST['submit'])){
                            $idupdate=$_GET['id'];
                        $name=$_POST['username'];
                        $email=$_POST['email'];
                        $pass=$_POST['pass'];
                        $cpass=$_POST['re_pass'];

                        $str_pass=password_hash($pass,PASSWORD_BCRYPT);
                        $str_cpass=password_hash($cpass,PASSWORD_BCRYPT);


                        // $updatequery="update user set id='$idupdate',name='$name',email='$email',degree'$degree',phone='$phone',password='$str_pass',cpassword='$str_cpass' where id=$idupdate";


                        $updatequery="UPDATE `stusents` SET `id`='$idupdate',`name`='$name',`email`='$email',`password`='$str_pass',`cpassword`='$str_cpass' WHERE id=$idupdate";
                        $query=mysqli_query($con,$updatequery);

                        if($query){
                            ?>
                            <script>alert("Data update successfully")</script>
                            <?php
                        }else{
                            ?>
                            <script>alert("Data not updated")</script>
                            <?php
                        }

                        }

                        ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" value="<?php echo $result['name'];?>" placeholder=" Enter Your full Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="<?php echo $result['email'];?>"  placeholder=" Enter Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="text"><i class="zmdi"></i></label>
                                <input type="text" name="degree" value="<?php echo $result['degree'];?>" placeholder="Enter your qulifaction" required/>
                            </div>
                            <div class="form-group">
                                <label for="text"><i class="zmdi"></i></label>
                                <input type="text" name="phone" value="<?php echo $result['phone'];?>" placeholder="Enter your phone" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" value="<?php echo $result['pass'];?>"  placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" value="<?php echo $result['re_pass'];?>"  placeholder="Repeat your password" required/>
                            </div>
                        
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Update"/>
                            </div>

                        </form>
                       
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" class="anima" alt="sing up image"></figure>
                        <div class="form-group form-button">
                                <a href="display.php"><input type="submit" id="signup" class="form-submit" value="Check form"/></a>
                            </div>
               
                    </div>
                   
           
            </div>
        </section>
    </div>
</body>
</html>



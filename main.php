
<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['username'])){
    ?>
    <script>alert("you are logout.please login");</script>
    <?php
    header('location:signin.php');


}

$query = "SELECT * FROM questions";
$total_questions = mysqli_num_rows(mysqli_query($con,$query));


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Quiz</title>
   <link rel="stylesheet" href="css/index.css">
   <?php include 'link.php'?>
   <style>

       ul li{
           list-style:none;
           text-align:center;
       }
   </style>
</head>
<body>
    <div class="section">
    <div class="main-body">
        <div class="header">
        <h1>Welcome <?php echo $_SESSION['username']?> <a href="logout.php" class="logout">Logout</a></h1> 
        </div>
     <ul class="choise">
         <li><strong>Number of Question:</strong><?php echo $total_questions; ?></li>
         <li><strong>Type:</strong>Multiple Choise</li>
         <li><strong>Estimated Time:</strong><?php echo $total_questions*1.5; ?></li>
     </ul>
   
<div class="option">
     <a href="question.php?n=1">start quiz</a>
   

</div>
    
    </div>
    </div>
   
</body>
</html>
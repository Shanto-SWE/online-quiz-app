<?php
session_start();


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
</head>
<body>
    <div class="section">
    <div class="main-body">
        <div class="header">
        <h1>welcome <?php echo $_SESSION['usernameadmin']?> Teacher Panel</h1>
        <h2 class="text-center">welcome to online quiz application</h2>
        </div>
     
   
<div class="option">
    <a href="add.php">Add a quiz</a>
    <a href="adminlogout.php">Logout</a>
</div>

    
    </div>
    </div>
</body>
</html>
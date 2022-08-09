<?php 
include 'connect.php';
session_start();

$score=$_SESSION['score'];
$username=$_SESSION['username'];

$insert="insert into quiznumber (name,score) values ('$username','$score')";

$query=mysqli_query($con,$insert);
if($query){
	?>

	<script>alert("data insert")</script>
	<?php
}else{

	?>

	<script>alert("data not insert")</script>
	<?php
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="css/question.css">
   
</head>
<body>
    
	<header>
		<div class="container">
			<p>Online Quiz App</p>
		</div>
	</header>
    
			<div class="container">
				<h2>Your Result</h2>
				<p>Congratulation You have completed this test succesfully.</p>
				<p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?>  </p>
				<?php unset($_SESSION['score']); ?>
                <button class="logout"><a href="logout.php">Logout</a></button>
			</div>
           

</body>
</html>



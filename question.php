<?php 
	include 'connect.php';
	session_start(); 
	//Set Question Number
	$number = $_GET['n'];

	
	$query = "SELECT * FROM questions WHERE question_number = $number";

	// Get the question
	$result = mysqli_query($con,$query);
	$question = mysqli_fetch_assoc($result); 

	//Get Choices
	$query = "SELECT * FROM options WHERE question_number = $number";
	$choices = mysqli_query($con,$query);
	// Get Total questions
	$query = "SELECT * FROM questions";
	$total_questions = mysqli_num_rows(mysqli_query($con,$query));
 	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="css/question.css">
    <?php include 'link.php'?>
    
</head>
<body>
<header class="header">
		<div class="container text-center">
			<p >Please answer all  the question</p>
	
	</header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-8 offset-lg-2">
            <div class="current ">Question  <?php echo $number; ?> of <?php echo $total_questions; ?></div>
				<p class="question"><?php echo $question['question_text']; ?></p>
				<form method="POST" action="process.php">
					<ul class="choicess">
                    <?php while($row=mysqli_fetch_assoc($choices)){ ?>
						<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['coption']; ?></li>
						<?php } ?>
						
						
					</ul>
					<input type="hidden" name="number"  value="<?php echo $number; ?>">
					<input type="submit" name="submit" value="Submit">


				</form>
				

			</div>
            </div>
        </div>
    </div>
</body>
</html>





<?php


include 'connect.php';

if(isset($_POST['submit'])){
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct-anwser'];
	// Choice Array
	$choice = array();
	$choice[1] = $_POST['choice1'];
	$choice[2] = $_POST['choice2'];
	$choice[3] = $_POST['choice3'];
	$choice[4] = $_POST['choice4'];


 // First Query for Questions Table


//  $insert="insert into questions(question_number,question_text) VALUES ('$question_number','$question_text')";

$query = "INSERT INTO questions (";
$query .= "question_number, question_text )";
$query .= "VALUES (";
$query .= " '{$question_number}','{$question_text}' ";
$query .= ")";

	$result = mysqli_query($con,$query);
	
	//Validate First Query
	if($result){
		foreach($choice as $option => $value){
			if($value != ""){
				if($correct_choice == $option){
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}
			


				//Second Query for optioin Table

                // $query="insert into options(question_number,is_correct,coption) VALUES ('$question_number','$is_correct','$value')";
                $query = "INSERT INTO options (";
				$query .= "question_number,is_correct,coption)";
				$query .= " VALUES (";
				$query .=  "'{$question_number}','{$is_correct}','{$value}' ";
				$query .= ")";

				$insert_row = mysqli_query($con,$query);
				// Validate Insertion of Choices

				if($insert_row){
					continue;
				}else{
					die("2nd Query for Choices could not be executed" . $query);
					
				}

			}
		}
		$message = "Question has been added successfully";
	}

	




}

		$query = "SELECT * FROM questions";
		$questions = mysqli_query($con,$query);
		$total = mysqli_num_rows($questions);
		$next = $total+1;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add question</title>
    <?php include 'link.php'?>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <div class="row add">
            <div class="col-lg-5 col-5  offset-lg-3 offset-sm-4 offset-xs-3 offset-0">
                <h1 class="mb-4">ADD A QUESTION</h1>
                <div class="alert alert-success" role="alert">
                <?php if(isset($message)){
					echo $message;
				} ?>
					
                         </div>

            <form method="POST" >
            <div class="mb-3">
            <label for="numberf">Question Number:</label>
                    <input type="number"  name="question_number" value="<?php echo $next;  ?>">
                </div>
             
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Question Text:</label>
                    <input type="text" class="form-control"name="question_text" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Choice 1:</label>
                    <input type="text" class="form-control" name="choice1" id="exampleItext1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Choice 2:</label>
                    <input type="text" class="form-control" name="choice2"  id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Choice 3:</label>
                    <input type="text" class="form-control" name="choice3"  id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Choice 4:</label>
                    <input type="text" class="form-control" name="choice4"  id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
            <label for="numberf">Correct Question anwser:</label>
                    <input type="number" name="correct-anwser"  >
                </div>
             
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
                <span>Back to <a href="adminhomepage.php"><storng>HOME</storng></a></span>
            </div>
        </div>
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  
  <style>
  
  button{
      
    outline:none;
    border:none;
      margin-top:20px;
      padding:10px 10px;
      background:#27ae60;
      color:white;
      border-radius:10px;
      width:180px;
      cursor: pointer;
  }
  </style>
</head>
<body>
<div class="container">

<h1>List of web developer</h1>
	<table>
		<thead>
			<tr>
               <th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Degree</th>
				<th>Phone</th>
                <th>status</th>
				<th colspan="2">Operation</th>
                <th>user photo</th>
			</tr>
		</thead>
		<tbody>
            
                <?php

                include 'connect.php';

                $selectquery="select * from students";

                $query=mysqli_query($con,$selectquery);


                while($res=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                    <td><?php echo $res['id']?></td>
                    <td><?php echo $res['name']?></td>
                    <td><span class="email"><?php echo $res['email']?></span></td>
                    <td><?php echo $res['degree']?></td>
                    <td><?php echo $res['phone']?></td>
                    <td><?php echo $res['status']?></td>
                    <td><a href="update.php?id=<?php echo $res['id']?>"><i class="fas fa-edit"></i></a></td>
                    <td><a href="delete.php?id=<?php echo $res['id']?>"><i class="fas fa-trash-alt"></i></a></td>
                    <td><img src="<?php echo $res['pic']?>" alt="" width=60 height=80></td>
                </tr>
                <?php
                }


                ?>
			
		
		</tbody>
	</table>
    <br>
    <br>
    <form method="POST">
    <button name="submit">Back to registraction page</button>
    </form>
   
 
 
</div>
</body>
</html>

<?php
if(isset($_POST['submit'])){

    header('location:signin.php');
}

?>
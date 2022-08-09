<?php

include 'connect.php';

$id=$_GET['id'];

$delete="DELETE FROM `students` WHERE id=$id";

$query=mysqli_query($con,$delete);


if($query){
    ?>
    <script>alert("Data delete successfully")</script>
    <?php
}else{
    ?>
    <script>alert("Data not deleted")</script>
    <?php
}

header("location:display.php");
?>





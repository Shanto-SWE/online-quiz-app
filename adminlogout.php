<?php

session_start();
session_destroy();



setcookie("emailcookie",null);
setcookie("passwordcookie",null);
header('location:adminsigninpage.php');






?>
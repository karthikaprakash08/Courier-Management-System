<?php
$serv="localhost";
$user="root";
$pass="";
$db="kourier_db";
$conn=mysqli_connect($serv,$user,$pass) or die("cant connect");
mysqli_select_db($conn,$db);
?>
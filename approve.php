<?php
$conn =new mysqli('localhost','root','','cedcab') or die('connection unsuucessful');
$ids= $_GET['id'];
$idupdate=$_GET['id'];
$status=1;
$query= "UPDATE tb_ride
SET status = 1 
WHERE ride_id=$ids ";
;

mysqli_query($conn,$query) or die("query unsuccesful") ;




header('location:admindata.php');



?>
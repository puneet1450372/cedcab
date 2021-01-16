<?php


$conn= new mysqli("localhost","root","","cedcab")or die("connection failed");

$id=$_GET['id'];


$query= "UPDATE tb_ride
SET status = 2 
WHERE status=0  and  ride_id=$id";
mysqli_query($conn,$query);

header('location:usernav.php');
?>
<?php


$conn= new mysqli("localhost","root","","cedcab")or die("connection failed");

$id=$_GET['id'];


$query= "UPDATE signup
SET status =0 
WHERE status=1  and  id=$id";
mysqli_query($conn,$query);

echo "<script>alert('You want to block user? ')</script>";
?>
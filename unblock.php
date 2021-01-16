<?php


$conn= new mysqli("localhost","root","","cedcab")or die("connection failed");

$id=$_GET['id'];


$query= "UPDATE signup
SET status =1
WHERE status=0  and  id=$id";
mysqli_query($conn,$query);

echo "<script>alert('You want to unblock user? ')</script>";
?>
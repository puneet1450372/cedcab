<?php


$conn= new mysqli("localhost","root","","cedcab")or die("connection failed");

$id=$_GET['id'];

$query="delete from location where id=$id";

mysqli_query($conn,$query);

header('location:locationlist.php');
?>
<?php

session_start();
extract($_POST);


 $dat=date("Y/m/d");
 $from=$_SESSION['pickup'];
 $to=$_SESSION['drop'];
 $cab_type=$_SESSION['type'];
 $total_distance=$_SESSION['distt'];
 $luggage=$_SESSION['Weight'];
 $total_fair=$_SESSION['x'];
 $status=0;
 $customer_user_id=$_SESSION['id'];

$db=new mysqli('localhost','root','','cedcab');

$insertdata="insert into tb_ride (date,`from`,`to`,cab_type,total_distance,total_fair,luggage,status,customer_user_id) values ('$dat','$from','$to','$cab_type','$total_distance','$total_fair','$luggage','$status','$customer_user_id')";

mysqli_query($db,$insertdata);
//  if ($db->query($insertdata) === TRUE) {
   
    echo "<script> alert('your ride has been booked admin approval is needed')</script>";
    
  // } 
  
  // else {
    echo "Error: ";
   
  // }

 


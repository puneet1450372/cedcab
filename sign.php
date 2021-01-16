<?php

extract($_POST);
$is_admin=0;
$status=1;
$dateofsign=date("Y/m/d");
$conn= new mysqli("localhost","root","","cedcab")or die("connection failed");

$pass=password_hash($password,PASSWORD_BCRYPT);
$emailquery="select * from signup where email='$email'";
$query= mysqli_query($conn,$emailquery);
$emailcount= mysqli_num_rows($query);
if($emailcount>0){
    echo "email already exits";

}
else{

$insertdata = "insert into signup(email,name,dateofsign,mobile,status,password,is_admin) values('$email','$name','$dateofsign','$mobile','$status','$pass','$is_admin')";
  if ($conn->query($insertdata) === TRUE) {
   
    echo "signup succesfull";
  } 
  
  else {
    echo "Error: " . $insertdata . "<br>" . $conn->error;
  }
} 
  $conn->close();

?>
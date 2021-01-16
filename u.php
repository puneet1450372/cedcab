<?php
$conn =new mysqli('localhost','root','','task') or die('connection unsuucessful');
$ids= $_GET['id'];
$queryshow="select *from taskdata where id={$ids}";
$show = mysqli_query($conn,$queryshow);
$arrdata=mysqli_fetch_array($show);
   
if (isset($_POST['submit'])){

$idupdate=$_GET['id'];
$pname=$_POST['name'];
$mobile=$_POST['mobile'];

//  $query="insert into newstudent(fname,lname,email,password) values ('$fname','$lname','$email','$password')";
  
$query= "update signup set id=$ids, name='$pname',mobile='$mobile' where id=$idupdate";


mysqli_query($conn,$query) or die("query unsuccesful") ;




header('location:index.php');


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
    label{
            padding-top: 14px;
            
        }
    input[type=submit]{
        width:40%;
        margin-bottom:10px;
    }
    div{
        background-color: #a3c3d9;
    }
    </style>
</head>
<body style="background-color: #81b3d4;">
<div style="text-align: center;margin-top:4%; margin-bottom:10px;">
<h1>Registration form</h1>
</div>

<form method="post" action="">


<div style="text-align: center;    width:40%;margin-left:27%; ;border-radius:10px"> 
    <form method="POST" action="">
    <label>parentsname</label>
    <input type="text" name="name" id="name" placeholder="Parent name" value="<?php echo $arrdata['pname']; ?>"><br>
    <label>Email</label>
   
    <input type="number" name="mobile" id="mobile"  value="<?php echo $arrdata['mobile']; ?>"><br>
    
    <input type="submit" value="Update" name="submit">
    </form>
<div>
  
</body>
</html> 
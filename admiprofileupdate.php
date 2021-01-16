<?php
session_start();
?>
<?php include 'adminnav.php'?>
<?php
$conn =new mysqli('localhost','root','','cedcab') or die('connection unsuucessful');
$queryshow="select *from signup where id=$_SESSION[id]";
$show = mysqli_query($conn,$queryshow);
$arrdata=mysqli_fetch_array($show);

if(isset($_POST['update']))
{
 
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$query="update signup SET name='$name' , mobile='$mobile'  where is_admin=1";
mysqli_query($conn,$query) or die('query unsucessfull');

echo "<script> alert('profile updated')</script>";

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
</head>
<body>

<div class="container">
  <h2>Update Profile</h2>
  <form method="POST" >
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" disabled name="email" value="<?php echo $arrdata['email'];?>">
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="EnterName" name="name" value="<?php echo $arrdata['name'];?>">
    </div>
    <div class="form-group">
      <label for="number">Mobile Number:</label>
      <input type="text" class="form-control" id="mobile" placeholder="Enter number" name="mobile" value="<?php echo $arrdata['mobile'];?>">
    </div>
   
    <button type="submit" class="btn btn-primary" name="update">Update</button>
  </form>
</div>
<?php include 'footer.php' ?>
</body>
</html>



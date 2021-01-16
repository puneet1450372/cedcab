<?php
session_start();
if (!isset($_SESSION['name'])) {
  header('location:login.php');
};



$conn =new mysqli('localhost','root','','cedcab') or die('connection unsuucessful');

$queryshow="select *from signup where id=$_SESSION[id]";
$show = mysqli_query($conn,$queryshow);
$arrdata=mysqli_fetch_array($show);

if(isset($_POST['update']))
{
 $name=$_POST['name'];
$mobile=$_POST['number'];
$query="update signup SET name='$name' , mobile='$mobile'  where id=$_SESSION[id]";
mysqli_query($conn,$query) or die('query unsucessfull');
echo "<script>alert('profile updated')</script>";
} 

?>


<?php include 'nav.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
 
</head>
<body>

<div class="container" class="form">
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
      <input type="text" class="form-control" id="mobile" placeholder="Enter number" name="number" value="<?php echo $arrdata['mobile'];?>">
    </div>
   
    <button type="submit" class="btn btn-primary" name="update">Update</button>
  </form>
</div>
<script>

$(document).ready(function(){

  $('#middata').css('display', 'none');
  $('#sorting').css('display', 'none');
})

</script>
</body>
<?php include 'footer.php' ?>
</html>



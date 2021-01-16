<?php
session_start();
?>
<?php include 'nav.php'?>
<?php
$conn =new mysqli('localhost','root','','cedcab') or die('connection unsuucessful');
$queryshow="select *from signup where id=$_SESSION[id]";
$show = mysqli_query($conn,$queryshow);
$arrdata=mysqli_fetch_array($show);

if(isset($_POST['submit']))
{
 $passwo=$_POST['pswd'];
$newpass=$_POST['cpswd'];
$pass_decode=password_verify($passwo, $arrdata['password']);
$pass=password_hash($newpass,PASSWORD_BCRYPT);

  // $q= "select * from signup where id=$_SESSION[id]";
  // $res= mysqli_query($conn,$q);

  if($passwo!='' && $newpass!='')
        {
          if($passwo==$pass_decode )
        {
          $q="update signup SET password='$pass' where id=$_SESSION[id]";
          mysqli_query($conn,$q) or die('unsucessful');
          echo "<script>alert('update')</script>";
        }
        else{
          echo "<script>alert('old password is not correct')</script>";
        }
      }
    else{
      echo "<script>alert('please fill password and new password')</script>";
    }
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
  <h2>Update Password</h2>
  <form method="POST" >
    <div class="form-group">
      <label for="email">Username/Email:</label>
      <input type="email" class="form-control" id="email" disabled placeholder="Enter email" name="email" value="<?php echo $arrdata['email'];?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" >
    </div>
    <div class="form-group">
      <label for="pwd">change Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter change password" name="cpswd">
    </div>
   
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>
<?php include 'footer.php' ?>
</body>
</html>
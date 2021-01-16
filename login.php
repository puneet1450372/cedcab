<?php
session_start();
?>


<html>
   
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" href="style.css">
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
            /* height: 400px auto; */
            background-image:url('taxi4.jpg');
         }
         /* label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         } */
         .box {
            border:#666666 solid 1px;
         }
         #mid{
            margin-top:7%;
            margin-bottom:9%;
            margin-left:25%;
            
           
         }
         form{
            
         }
         
       .box{
         width: 140%;
         height: 40px;
       }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	<?php include 'navbar.php'?>
      <div  id="mid">
         <div style = "width:300px; border: solid 1px #333333;background-color: white;height:300px; width:350px " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px; "><b>Login</b></div>
				
            <div style = "margin:40px">
            <?php
$conn= new mysqli("localhost","root","","cedcab")or die("connection failed");

if(isset($_POST['submit'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $email_search="select *from signup where email='$email'";
  $query =mysqli_query($conn,$email_search);
  $email_count = mysqli_num_rows($query);


   if($email_count){
      $email_pass =mysqli_fetch_assoc($query);
      $status=$email_pass['status'];
      $db_pass =$email_pass['password'];
     
      $db_admin=$email_pass['is_admin'];
     
      $_SESSION['name']=$email_pass['name'];
     
      $_SESSION['id']=$email_pass['id'];
     
      $pass_decode=password_verify($password, $db_pass);
            
      if($pass_decode){
        
         if($db_admin==0){
            if($status==1)
            {
               header("location:usernav.php");
               echo "<h2 style='color:green'>login successful</h2>";
            }
            else if($status==0)
            {
               echo "'you are blocked from the admin'";
            }
        
         }
         else if($db_admin==1){
            echo "<h2 style='color:green'>login successful</h2>";
            header('location:admindata.php');
         }

      }
      else{
         echo "<i style='color:red'>password incorrect<i>";
      }
   }
   else{
      echo  "<i style='color:red'>Invalid Email<i>";
   
   }

}

?>
               
               <form action = "<?php echo( htmlentities($_SERVER['PHP_SELF']))?>" method = "post">
              
                  <input type = "email" name = "email" class = "box" placeholder="username /email"/><br /><br />
                 <input type = "password" name = "password" class = "box" placeholder="password"/><br/><br />
                  <input type = "submit" value = " Submit " name="submit"/><br />
                  <p>have't Account <a href="signup.php">create an account</a></p>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>
      <?php include 'footer.php'?>
   </body>
</html>
<?php
// Start the session
session_start();
if(isset($_POST['submit'])){
    $otp=rand(1000,9999);
    $_SESSION['otp']=$otp;
  require 'phpmailer/PHPMailerAutoload.php'; 
    
  $mail = new PHPMailer; 
    
  try { 
      // $mail->SMTPDebug = 2;                                        
      $mail->isSMTP();                                             
      $mail->Host       = 'smtp.gmail.com;';                     
      $mail->SMTPAuth   = true;                              
      $mail->Username   = 'yadavpuneet766@gmail.com';                  
      $mail->Password   = 'puneetyadav';                         
      $mail->SMTPSecure = 'tls';                               
      $mail->Port       = 587;   
    
      $mail->setFrom('yadavpuneet766@gmail.com', 'puneetyadav');            
      $mail->addAddress($_POST['email']); 
     
         
      $mail->isHTML(true);                                   
      $mail->Subject = 'Subject'; 
      $mail->Body    = 'Your OTP is <b>bold</b> '.'<h1 id="otp">'.$otp.'</h1>';
      $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
      $mail->send(); 
      
     
      echo "Mail has been sent successfully!"; 
      
  } catch (Exception $e) { 
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
  } 
}


  $sotp=$_SESSION['otp'];
  
  if(isset($_POST['verifybtn'])){
        
    if($sotp==$_POST['verify']){
     
      echo "otp verified";
    }
    else{
      echo " otp not verified";
    }
  }
      
 
  ?> 

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <form method="POST" >
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
  <label>Subject</label>
  <input class="form-control form-control-lg" type="text" placeholder="Subject" >
  </div>
  
  
  <div class="form-group">
  <label>message</label>
  <input class="form-control form-control-lg" type="text" placeholder="message box">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <input type="text" name="verify">
  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit">Submit</button>
  <button type="submit" name="verifybtn">verify</button>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php

// Start the session
session_start();
extract($_POST);

if($data == "on"){
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

if($data == "off")
{
  $sotp=$_SESSION['otp'];

        
    if($sotp==$votp){
     
      echo "otp verified";
    }
    else{
      echo " otp not verified";
    }
}

 
  ?> 
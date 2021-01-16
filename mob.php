<?php

 session_start();

extract($_POST);
 if($data == "on"){
    $otp=rand(1000,9999);
    $_SESSION['veryfy']=$otp;
    $field = array(
        "sender_id" => "FSTSMS",
        "language" => "english",
        "route" => "qt",
        "numbers" => "$mobile",
        "message" => "42834",
        "variables" => "{#BB#}",
        "variables_values" => "$otp"
    );
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($field),
      CURLOPT_HTTPHEADER => array(
        "authorization: ON5u8iI79teLlf2DVK6Y3xBnPqHsFoATR1dGErhwkjUzbWp4yJFT9UzsjWlKJRDYEtLZi2Gchag4XMH6",
        "cache-control: no-cache",
        "accept: */*",
        "content-type: application/json"
      ),
    ));
    
   curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo "OTP sent successfully";
    }
  }
  else if($data=="off"){
  
    if($votp==$_SESSION['veryfy']){
        echo "otp verified";
    }
    else{
        echo "not verified'";
    }
  }
?>
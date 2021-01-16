
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        #submit{
            margin-bottom:35px;
            background-color: #ccd138;
        }
       /* button{
        height: 35px;
           width: 300px;
            border-radius: 10px;
            outline:none;
            background-color: green;
           
       } */
        body{
            background-image:url('taxi4.jpg');
             /* height: 600px; */
             border-radius: 100px;
             background-size:100% 100%;
             
        }
        input{
           height: 35px;
           width: 80%;
            border-radius: 4px;
            outline:none;
        }
       
        form{
            background-color: #ddd;
            margin-bottom:50px;
            border-radius:10px;
        }
        
        </style>
</head>
<body>
<?php include 'navbar.php'?>
<section>

    <form  style="border:2px solid white;text-align:center; width:30%; margin-left:15%;margin-top:4%;">
    <h3 style="color:red" id="result"></h3>
    
        <h1>SignUp</h1>
       
   <p> <input type="text" id="fname" name="fname" placeholder="name"></p>
  
   <p> <input type="email" id="email" disabled name="email" placeholder="Email"></p>
   
   <div class="container">
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" data-toggle="modal" data-target="#myModal"   id="getgotp" name="getgotp" style=" background-color: #a5a848;border-color: #ccd138; color:#444a49;margin-top:-10px;margin-bottom:5px;margin-left:8%; font-weight:400;padding-bottom:0px;float:left;">gmail otp</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h4 class="modal-title" style="margin-right:50%;" >CedCab</h4>
                                                            <button type="button" class="close" data-dismiss="modal" ><a href="taxi.php">&times;</a></button>
                                                               
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <p id="data" style="font-size:25px;"></p>
                                                                 <input type="text" id="otpgbox" placeholder="enter email otp">
                                                            </div>
                                                            <div class="modal-footer">
                                                            <!-- <button><a href="signup.php">BOOK CAB</a></button> -->
                                                            <button type="button" style="background-color: green; font-size:15px;" id="vgotp" name="vgotp" >verify otp</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
   
  
   
    <!-- <button type="button" style="background-color: red; font-size:15px;" id="getmotp" name="getmotp" value="1">Get OTP</button>
  <button type="button" style="background-color: green; font-size:15px;" id="vmotp" name="vmotp"  value="2">verify otp</button><br>
  <p id="data"></p> -->
   <p> <input type="text" id="mobile" disabled name="mobile"  placeholder="Mobile no."></p>
 <!-- <button type="button" style="background-color: red; font-size:15px;margin-bottom:15px;margin-left:0%;" id="getmotp" name="getmotp" value="1">Get OTP</button>
  <button type="button" style="background-color: green; font-size:15px;" id="vmotp" name="vmotp"  value="2">verify otp</button><br>
<input type="text" id="otpmbox" placeholder="enter mobile otp"><br> -->
<!-- Button trigger modal -->
<button type="button" data-toggle="modal" id="getmotp" name="getmotp" data-target="#exampleModal" style=" background-color: #a5a848;border-color: #ccd138; color:#444a49;margin-top:-10px;margin-bottom:5px;margin-left:12%; font-weight:400;padding-bottom:0px;float:left;">
 mob otp
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">cedcab</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p id="data1"></p>
      <input type="text" id="otpmbox" placeholder="enter mobile otp"><br>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary" id="vmotp" name="vmotp">verify</button>
      </div>
    </div>
  </div>
</div> 
    <p><input type="password" disabled   id="password" name="password" placeholder="password"></p>
    <p><input type="password" disabled id="cpassword" name="cpassword" placeholder="confirm password"></p>
    <input type="button" id="submit" value="Create Account" name="submit"><br>
    
    
   </form>
</section> 
<script>

$(document).ready(function(){
  $("#getgotp").hide();
  $("#getmotp").hide();
  $("#email").focus(function(){
    $("#getgotp").show();
   });
   $("#mobile").focus(function(){
    $("#getmotp").show();
   });

   $('#password').keyup(function(){
    $('#cpassword').removeAttr("disabled");
  
   })
   $('#fname').keyup(function(){
    $('#email').removeAttr("disabled");
  
   })
});

  </script>
   <script>
$(document).ready(function(){
    $('#getgotp').click(function(){
  var email=$('#email').val();
   
  // var btn=$('#getmotp').val();
 
  $.ajax({
    url:'email.php',
    type:'POST',
    data:{data:'on' ,email:email },

    success : function(data){
      $('#data').html(data);

    }

  })
 
});
    
$('#vgotp').click(function(){
  var votp=$('#otpgbox').val();
$.ajax({
    url:'email.php',
    type:'POST',
    data:{data:'off',votp:votp},
    success:function(data){
      $('#data1').html(data);
      $("#getgotp").hide();
      $('#mobile').removeAttr("disabled");
  
    }
    
  })

})
$('#getmotp').click(function(){
    var mobile=$('#mobile').val();
    // var btn=$('#getmotp').val();
    console.log(mobile);
    $.ajax({
      url:'mob.php',
      type:'POST',
      data:{data:"on",mobile:mobile },

      success : function(data){
        $('#data1').html(data);

      }

    })
  });
  $('#vmotp').click(function(){
    var votp=$('#otpmbox').val();
$.ajax({
      url:'mob.php',
      type:'POST',
      data:{data:"off",votp:votp},
      success:function(data){
        $('#data1').html(data);
        $("#getmotp").hide();
      $('#password').removeAttr("disabled");
      }
    })

  })
})
$(document).ready(function(){
    $('#submit').click(function(){
      var votm=$('#otpmbox').val();
      var votg=$('#otpgbox').val();
        var name=$('#fname').val();
    var email=$('#email').val();
   var mobile=$('#mobile').val();
   var password=$('#password').val();
   var cpassword=$('#cpassword').val();
//    $_SESSION["favcolor"] = "yellow";

   debugger;
        if(name==""){
            alert("name not filled");
        }
        else if( email==""){
            alert("email not filled");
        }
        else if(mobile==""){
            alert("mobile not filled");
        }
        else if(password==''){
            alert("password not filled");
        }
        else if(cpassword==''){
            alert("password not filled");
        }
        else if(password!=cpassword)
        {
            alert('password and confirm password must be same');
        }
        else if( votm==""){
          alert('please verify the mobile number')
        }
        else if( votg==""){
          alert('please verify the gmail')
        }
        else{
            

        $.ajax({
            url:'sign.php',
            type:"POST",
            data:{
                'name':name,
                'email':email,
                'mobile':mobile,
                'password':password,
               
            },
            success: function(data){
               $('#result').html(data);
            }
        });
        } 
    });
    

});
       
    </script>
 
</body>
<?php include 'footer.php'?>
</html>
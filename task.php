

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  /* #submit{
            margin-bottom:35px;
            background-color: #ccd138;
        }
     button{
        height: 35px;
           width: 300px;
            border-radius: 10px;
            outline:none;
            background-color: green;
           
       } 
        body{
            background-image:url('taxi4.jpg');
             /* height: 600px; */
             /* border-radius: 100px;
             background-size:100% 100%; */
             
        }
        input{
           height: 10px;
           width: 50%;
            border-radius: 4px;
            outline:none;
        }
       
       div  input{
            padding: 7px;
            margin-top:3%;
            background-color: #ddd;
        }
        label{
            padding-top: 14px;
            
        }
    input[type=submit]{
        width:40%;
        margin-bottom:10px;
    }
    div{
        background-color: #c2cfc5;
    }
    </style>
</head>
<body>
    <div style="text-align: center;   border:1px solid gray; width:40%;margin-left:27%;"> 
    <form method="POST" action="">
    <label>parentsname</label>
    <input type="text" name="pname" id="pname" placeholder="Parent name"><br>
    <label>Email</label>
    <input type="email" name="email" id="email" placeholder="email"><br>
    <label>parentsname</label>
    <input type="text" name="sname" id="pname" placeholder="Student name"><br>
    <label>Student Gender</label>
    <label>Male</label><input type="radio" name="check" id="check"  value="male">
    <label>female</label> <input type="radio" name="check" id="check" value="female"><br>
    <label>student Birthday</label>
    <input type="date" name="date" id="date"><br>
    <label>Contact number_</label>
    <input type="number" name="numb" id="numb"><br>
    <label>Do you recieve Text at this number</label>
    <label>yes</label><input type="radio" name="rec" id="rec" value="yes">
    <label>no</label><input type="radio" name="rec" id="rec" value="no"><br>
    <label>Address</label>
    <input type="text" name="add" id="add"><br>
    <label>City</label>
    <input type="text" name="city" id="city"><br>
    <label>Zip code</label>
    <input type="number" name="zip" id="zip"><br>

    <input type="submit" value="submit" name="submit">
    </form>
<div>
   
    <?php
   
 if(isset($_POST['submit'])){
$conn= new mysqli("localhost","root","","task")or die("connection failed");
$pname=$_POST['pname'];
$email=$_POST['email'];
$sname=$_POST['sname'];
$check=$_POST['check'];
$date=$_POST['date'];
$numb=$_POST['numb'];
$rec=$_POST['rec'];
$add=$_POST['add'];
$city=$_POST['city'];
$zip=$_POST['zip'];


$insertdata = "insert into taskdata(pname,email,sname,sgender,sbirthday,cnumber,Tnumber,address,city,zip) values('$pname','$email','$sname','$check','$date','$numb','$rec','$add','$city','$zip')";
$conn->query($insertdata);
if ($conn->query($insertdata) === TRUE) {
   
    echo "signup succesfull";
  } 
  
  else {
    echo "Error: ";
  }

 
}
$show="slelect *from taskdata ";
$conn->query($show);
?>
</body>
</html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

<style>
button{
  margin-bottom:0px;
  border-color:lightblue;
  font-size:20px;
  height: 40px;
  width: 170px;
  color:#418d99;
  border-radius:5px;
}
.col-lg-3{
  background-color:#4b9391;
  border-radius: 10px;
  width: 300px;
  height: 170px ;
}
h1,p{
  color:white;
}
.row{
  margin-left:6%;
}
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}
table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

</head>
 
<body style="background-color: ">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" style="font-size:30px;line-height:1">CED CAB</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="admindata.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Rides <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  class="RREQ">Ride requests</a></li>
            <li><a  class="COMRIDE">Completed rides</a></li>
            <li><a  class="CANRIDE">Canceled ride</a></li>
            <li><a class="ARIDE">All ride</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" class="PENUSER">Pending user request</a></li>
            <li><a href="#" class="APPUSER">Approved user request</a></li>
            <li><a href="#" class="ALLUSER" >All Users</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Location <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" class="LOC" >Location List</a></li>
            <li><a id="locadd">Add location</a></li>
           
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href='adminchangepass.php'>Change password </a></li>
            <li><a  href="admiprofileupdate.php">Edit Profile</a></li>
            
          </ul>
        </li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> <?php echo "HI"." ".$_SESSION['name'];?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

</body></html>
<?php
session_start();
if (!isset($_SESSION['name'])) {
  header('location:login.php');
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> 
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <style>
    button {
      margin-bottom: 20px;
      border-color: lightblue;
      font-size: 20px;
      color: #418d99;
      border-radius: 5px;
    }

    .col-lg-3 {
      background-color: #abd3f4;
      border-radius: 10px;
      padding-top: 20px;
      padding-bottom: 20px;
    }

    .row {
      margin-left: 10%;
    }

    table {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    table td,
    table th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    table tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    table tr:hover {
      background-color: #ddd;
    }

    table th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
   
  </style>
</head>

<body>

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
          <li class="active"><a href="usernav.php">Home</a></li>
          <li><a href="taxi.php">Book my Cab</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Rides <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a class="pending">Pending Rides</a></li>
              <li><a class="completed">Completed Rides</a></li>
              <li><a class="allrides">All rides</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href='userprofileupdate.php'>Update information</a></li>
              <li><a href='userpasschange.php'>Change password</a></li>

            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href=""><span class="glyphicon glyphicon-user"></span> <?php echo "hello" . " " . $_SESSION['name']; ?></a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="sorting" style="float: right; display:none;">
    <input id="myInput" type="text" placeholder="Search..">

    
    
  </div>

  <p id="pendingdata"></p>
  <div class="container" style="margin-top:4%;">
    <div class="row" style=" text-align:center" id="middata">
      <div class="col-lg-3" style="border:1px solid black; margin:20px; background-color:#8cb4d8">
        <h3>Pending rides</h3>
        <p><?php $db = new mysqli('localhost', 'root', '', 'cedcab');
            $q = "select * from tb_ride where status=0 and customer_user_id=$_SESSION[id]";
            $query = mysqli_query($db, $q);
            $pending = mysqli_num_rows($query);
            echo $pending;
            ?></p>
        <button class="pending">pending rides</button>
      </div>
      <div class="col-lg-3 " style="border:1px solid black; margin:20px;background-color:#dba057">
        <h3>Completed rides</h3>
        <p><?php $db = new mysqli('localhost', 'root', '', 'cedcab');
            $q = "select * from tb_ride where status=1 and customer_user_id=$_SESSION[id]";
            $query = mysqli_query($db, $q);
            $com = mysqli_num_rows($query);
            echo $com;
            ?></p>
        <button class="completed">completed rides</button>
      </div>
      <div class="col-lg-3 " style="border:1px solid black; margin:20px; background-color:#fc92c5;">
        <h3>All rides</h3>
        <p><?php $db = new mysqli('localhost', 'root', '', 'cedcab');
            $q = "select * from tb_ride where  customer_user_id=$_SESSION[id]";
            $query = mysqli_query($db, $q);
            $pending = mysqli_num_rows($query);
            echo $pending;
            ?></p>
        <button class="allrides"> All rides</button>
      </div>
      <div class="col-lg-3 " style="border:1px solid black; margin:20px; background-color:#bcf975">
        <h3>Total Expanses</h3>
        <p><?php
            $db = new mysqli('localhost', 'root', '', 'cedcab');
            $q = " select SUM(total_fair) from tb_ride where  customer_user_id=$_SESSION[id] and status=1";
            $result = mysqli_query($db, $q);
            $row = mysqli_fetch_array($result);

            echo $row['SUM(total_fair)'];


            ?></p>
        <button>Toatal Expanses</button>
      </div>
    </div>
  </div>
  
  <script>
    $(document).ready(function() {

      $('.pending').click(function() {

        $.ajax({
          url: 'pendingrides.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none');
            $('#sorting').css('display', 'block');
            $('#pendingdata').html(data);
          }
        })
      })
      $('.completed').click(function() {
        $.ajax({
          url: 'completedrides.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none');
            $('#sorting').css('display', 'block');
            $('#pendingdata').html(data);

          }
        })

      })
      $('.allrides').click(function() {
        $.ajax({
          url: 'allride.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none');
            $('#sorting').css('display', 'block');
            $('#pendingdata').html(data);
          }
        })
      })
      // $('#Upinfo').click(function() {
      //   $.ajax({
      //     url: 'userprofileupdate.php',
      //     type: 'POST',
      //     data: {},
      //     success: function(data) {
      //       $('#middata').css('display', 'none');
      //       $('#sorting').css('display', 'none');
      //       $('#pendingdata').html(data);
      //     }
      //   })
      // })
      // $('#Changepass').click(function() {
      //   $.ajax({
      //     url: 'userpasschange.php',
      //     type: 'POST',
      //     data: {},
      //     success: function(data) {
      //       $('#middata').css('display', 'none');
      //       $('#sorting').css('display', 'none');
      //       $('#pendingdata').html(data);
      //     }
      //   })
      // })
      })
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    $(document).ready( function () {
    $('#myTable').DataTable();
} );


  </script>
<?php include 'footer.php' ?>
</body>

</html>
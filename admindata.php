<?php
session_start();
if (!isset($_SESSION['name'])) {
  header('location:login.php');
};
?>
<?php include 'adminnav.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <div id="sorting" style="float: right; display:none;">
    <input id="myInput" type="text" placeholder="Search..">


  </div>
  <div id="result"></div>

  <div id="middata">
    <?php ?>
    <div class="container">
      <div class="row" style=" text-align:center">
        <div class="col-lg-3" style="border:1px solid black; margin:20px;">
          <h3>Ride Request</h3>
          <p><?php
              $db = new mysqli('localhost', 'root', '', 'cedcab');
              $q = "select * from tb_ride where status=0";
              $query = mysqli_query($db, $q);
              echo  $row = mysqli_num_rows($query);
              ?></p>
          <button class="RREQ">Ride request</button>
        </div>
        <div class="col-lg-3 " style="border:1px solid black; margin:20px;">
          <h3>Completed Rides</h3>
          <p><?php $db = new mysqli('localhost', 'root', '', 'cedcab');
              $q = "select * from tb_ride where status=1";
              $query = mysqli_query($db, $q);
              echo  $row = mysqli_num_rows($query);           ?></p>
          <button class="COMRIDE">Completed Rides</button>
        </div>
        <div class="col-lg-3 " style="border:1px solid black; margin:20px;">
          <h3>Cancelled Rides</h3>
          <p><?php $db = new mysqli('localhost', 'root', '', 'cedcab');
              $q = "select * from tb_ride where status=2";
              $query = mysqli_query($db, $q);
              echo  $row = mysqli_num_rows($query);          ?></p>
          <button class="CANRIDE">Cancelled Rides</button>
        </div>

      </div>
    </div>
    <div class="container">
      <div class="row" style=" text-align:center">
        <div class="col-lg-3" style="border:1px solid black;margin:20px;">
          <h3>All Rides</h3>
          <p><?php $db = new mysqli('localhost', 'root', '', 'cedcab');
              $q = "select * from tb_ride";
              $query = mysqli_query($db, $q);
              echo  $row = mysqli_num_rows($query);           ?></p>
          <button class="ARIDE">All Rides</button>
        </div>
        <div class="col-lg-3 " style="border:1px solid black; margin:20px;">
          <h3>Approved user </h3>
          <p><?php $db = new mysqli('localhost', 'root', '', 'cedcab');
              $q = "select * from tb_ride where status=1";
              $query = mysqli_query($db, $q);
              echo  $row = mysqli_num_rows($query);           ?></p>
          <button class="APPUSER">Approved user </button>
        </div>
        <div class="col-lg-3 " style="border:1px solid black; margin:20px;">
          <h3>Pending user </h3>
          <p><?php $db = new mysqli('localhost', 'root', '', 'cedcab');
              $q = "select * from tb_ride where status=0";
              $query = mysqli_query($db, $q);
              echo  $row = mysqli_num_rows($query);           ?></p>
          <button class="PENUSER">Pending user </button>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row" style=" text-align:center">
        <div class="col-lg-3" style="border:1px solid black; margin:20px;">
          <h3>All users</h3>
          <p><?php $db = new mysqli('localhost', 'root', '', 'cedcab');
              $q = "select * from signup ";
              $query = mysqli_query($db, $q);
              echo  $row = mysqli_num_rows($query);           ?></p>
          <button class="ALLUSER">All users</button>
        </div>
        <div class="col-lg-3 " style="border:1px solid black; margin:20px;">
          <h3> Serviceable Locations </h3>
          <p><?php $db = new mysqli('localhost', 'root', '', 'cedcab');
              $q = "select * from location where is_available=1";
              $query = mysqli_query($db, $q);
              echo  $row = mysqli_num_rows($query);             ?></p>
          <button class="LOC">Serviceable </button>
        </div>
        <div class="col-lg-3 " style="border:1px solid black; margin:20px;">
          <h3> Total Earning </h3>
          <p><?php
              $db = new mysqli('localhost', 'root', '', 'cedcab');
              $q = " select SUM(total_fair) from tb_ride where   status=1";
              $result = mysqli_query($db, $q);
              $row = mysqli_fetch_array($result);

              echo $row['SUM(total_fair)'];


              ?></p>
          <button>Earnings</button>
        </div>

      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('.RREQ').click(function() {
        $.ajax({
          url: 'ridereqest.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none')
            $('#sorting').css('display', 'block')
            $('#result').html(data);

          }
        })
      })
      $('.COMRIDE').click(function() {
        $.ajax({
          url: 'admincompletedride.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none')
            $('#sorting').css('display', 'block')
            $('#result').html(data);

          }
        })
      })

      $('.CANRIDE').click(function() {
        $.ajax({
          url: 'admincancel.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none')
            $('#sorting').css('display', 'block')
            $('#result').html(data);

          }
        })
      })
      $('.ARIDE').click(function() {
        $.ajax({
          url: 'adminallrides.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none')
            $('#sorting').css('display', 'block')
            $('#result').html(data);

          }
        })
      })
      $('.APPUSER').click(function() {
        $.ajax({
          url: 'appuserreq.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none')
            $('#sorting').css('display', 'block')
            $('#result').html(data);

          }
        })
      })

      $('.PENUSER').click(function() {
        $.ajax({
          url: 'userpenreq.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none')
            $('#sorting').css('display', 'block')
            $('#result').html(data);

          }
        })
      })


      $('.ALLUSER').click(function() {
        $.ajax({
          url: 'adminallusers.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none')
            $('#sorting').css('display', 'block')
            $('#result').html(data);

          }
        })
      })

      $('.LOC').click(function() {
        $.ajax({
          url: 'locationlist.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none')
            $('#sorting').css('display', 'none')
            $('#result').html(data);

          }
        })
      })
      $('#passchange').click(function() {
        $.ajax({
          url: 'adminchangepass.php',
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none')
            $('#sorting').css('display', 'none')
            $('#result').html(data);

          }
        })
      })
      // $('#profilechange').click(function(){
      //   $.ajax({
      //     url:"admiprofileupdate.php",
      //     type:'POST',
      //     data:{},
      //     success:function(data){
      //       $('#middata').css('display','none')
      //       $('#sorting').css('display','none')
      //       $('#result').html(data);

      //     }
      //   })
      // })
      $('#locadd').click(function() {
        $.ajax({
          url: "locationAdd.php",
          type: 'POST',
          data: {},
          success: function(data) {
            $('#middata').css('display', 'none')
            $('#sorting').css('display', 'none')
            $('#result').html(data);

          }
        })
      })

    })
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $('#example').DataTable({
        "ajax": '../ajax/data/arrays.txt'
      });
    });
  </script>
</body>
<?php include 'footer.php' ?>
</html>
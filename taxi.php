<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('location:login.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container-fluid body">
        <p style="font-weight: 700; text-align:center; color:white; visibility:hidden;">Book a City CedCabto your destination in town hello my user</p>
       
        <h1 style="font-weight: 700; text-align:center; color:white;" class="title">BOOK a City Ced<span style="color:#ccd138;">Cab </span>to your destination in town </h1>
        <h5 style="font-size:25px; color:white;" class="title">Choose from a range of categories and prices</h5>
        <form>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 form1">
                    <div style="text-align: center;">
                        <h3 style="background-color:#ccd138;margin-top:5%;margin-left:35%;  margin-right:35%; text-align:center;border-radius:100px;"><span style="color: black;">City taxi</span></h3>

                        <h4> your everyday travel partner</h4>
                        <p>AC Cabs for point to point travel</p>

                        <select id="pickup" name="pickup">
                            <option><span style="font-size:2vw;">Choose your pickup point<span></option>

                            <?php
                            $db = new mysqli('localhost', 'root', '', 'cedcab');
                            $q = "select *from location";
                            $result = mysqli_query($db, $q);

                            $n = mysqli_num_rows($result);

                            for ($i = 0; $i <= $n; $i++) {
                                $row = $result->fetch_assoc();
                            ?>
                                <option value="<?php echo $row['name'];  ?>"><?php echo $row['name']; ?></option>
                            <?php
                            }
                            ?>
                            <select><br>

                                <select id="drop" name="drop">
                                    <option><span>Choose your drop point<span></option>
                                    <?php
                                    $db = new mysqli('localhost', 'root', '', 'cedcab');
                                    $q = "select *from location";
                                    $result = mysqli_query($db, $q);

                                    $n = mysqli_num_rows($result);

                                    for ($i = 0; $i <= $n; $i++) {
                                        $row = $result->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $row['name'];  ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                    <select><br>

                                        <select id="type" name="type">
                                            <option>
                                                <span>Choose your Car type</span>
                                            </option>
                                            <option value="CedMicro"> CedMicro</option>
                                            <option> CedMini</option>
                                            <option>CedRoyal</option>
                                            <option>CedSUV</option>
                                        </select><br>
                                        <h4 id='alert' style="color:red;"></h4>
                                        <input type="number" id="Weight" name="Weight" placeholder="enter your luggage weight" onpaste="return false">



                                        <div class="container">
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-info btn-lg btnn" data-toggle="modal" data-target="#myModal" id="button" style=" background-color: #a5a848;border-color: #ccd138; color:#444a49; font-weight:400;padding-bottom:0px">calculate fare</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" style="margin-right:50%;">CedCab</h4>
                                                            <button type="button" class="close" data-dismiss="modal"><a href="taxi.php">&times;</a></button>

                                                        </div>

                                                        <div class="modal-body">
                                                            <p id="display" style="font-size:25px;"></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button id="booking"><a href="usernav.php">BOOK CAB</a></button>
                                                            <!-- <button><a href="signup.php">BOOK CAB</a></button> -->

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            $(document).ready(function() {
                $('#booking').click(function() {


                    $.ajax({
                        url: 'userbookcabinsert.php',
                        type: "POST",
                        data: {},
                        succes: function(data) {

                            $('#display').html(data);


                        }
                    })
                })
            })
            var invalidChars = ["-", "e", "+", "E"];

            $("input[type='number']").on("keydown", function(e) {
                if (invalidChars.includes(e.key)) {
                    e.preventDefault();
                }
            });

            $('#type').click(function() {
                var value = $(this).val();
                if (value == 'CedMicro') {
                    $('#Weight').prop('disabled', true);
                    $('#Weight').val('');
                    $('#Weight').attr('placeholder', 'carriage is not available for CEDMicro');
                } else {
                    $('#Weight').prop('disabled', false);
                    $('#Weight').attr('placeholder', 'Enter Weight in KG');
                }
            });
            $('#pickup').change(function() {
                $("#drop option").show();
                $('#drop option[value=' + $(this).val() + ']').hide();
            });

            $('#drop').change(function() {
                $("#pickup option").show();
                $('#pickup option[value=' + $(this).val() + ']').hide();
            });
            $(document).ready(function() {
                $('#button').click(function() {
                    var pickup = $('#pickup').val();
                    var drop = $('#drop').val();
                    var type = $('#type').val();
                    var Weight = $('#Weight').val();


                    $.ajax({
                        url: "faretest.php",
                        type: "POST",
                        data: {
                            'pickup': pickup,
                            'drop': drop,
                            'type': type,
                            'Weight': Weight
                        },
                        success: function(msg) {
                            $('#display').html(msg);
                        }
                    })


                })
            })
        </script>
        <section>
            <div class="container-fluid">
                <div class="row" style="text-align: center; background-color:#474645; margin:-29px; margin-top:2%;">
                    <div class="col-sm" style="font-size: 30px;color:white;">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                    </div>

                    <div class="col-sm">
                        <h2 style="color: white;">Ced <span style="color: #ccd138 ;font-weight:700;">Cab</span></h2><br>
                        <!-- <span style="color: white;"> <i class="fa fa-heart" aria-hidden="true"></i></span>
  copyright@cedcoss -->
                    </div>

                    <div class="col-sm ">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm fo">
                                    <a href="#" style="color: white;"> Disclaimer</a>
                                </div>
                                <div class="col-sm fo">
                                    <a href="#" style="color: white;"> Review</a>
                                </div>
                                <div class="col-sm fo">
                                    <a href="#" style="color: white;">Login</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>
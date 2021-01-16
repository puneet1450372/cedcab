<?php

session_start();
?>

<?php
echo "<h2> All rides</h2>";
$con =new mysqli('localhost','root','','cedcab') or die('connection unsuucessful');
$selectquery= "select *from tb_ride where customer_user_id=$_SESSION[id]";

$query=mysqli_query($con,$selectquery);

$nums=mysqli_num_rows($query);

$_SESSION['totalride']=$nums;

echo "<table border='1px' cellpadding='5px' cellspacing='0px' width='100%';>";
echo "<thead>";
echo "<tr style='font-size:20px; text-align:center; background-color:#cdea9f'>";
echo "<th>Date</th><th>from</th><th>To</th><th>Cab_type</th><th>Total_distance</th><th>Total_fair</th><th>Luggage</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while(
    $res=mysqli_fetch_array($query)){
 ?>
    <tr style="font-size:15px; ">
   
    <td><?php echo $res['date'];?></td>
    <td><?php echo $res['from'];?></td>
    <td><?php echo $res['to'];?></td>
    <td><?php echo $res['cab_type'];?></td>
    <td><?php echo $res['total_distance'];?></td>
    <td><?php echo $res['total_fair'];?></td>
    <td><?php echo $res['luggage'];?></td>
   
  
  
    </tr>  
<?php
    }
    echo "</tbody>";
?>


<?php
echo "</table>";
?>
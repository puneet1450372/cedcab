<?php

echo "<h2>All user pending Request</h2>";
$con =new mysqli('localhost','root','','cedcab') or die('connection unsuucessful');
$selectquery= "select *from tb_ride where status=0 ";

$query=mysqli_query($con,$selectquery);

$nums=mysqli_num_rows($query);

echo "<table  border='1px' cellpadding='5px' cellspacing='0px' width='100%';>";
echo "<tr style='font-size:20px; text-align:center;'>";
echo "<th>Date</th><th>from</th><th>To</th><th>Cab_type</th><th>Total_distance</th><th>Total_fair</th><th>Luggage</th><th>Status</th><th>Action</th>";
echo "</tr>";

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
    <td><?php echo "Pending...";?></td>
    <td><a href="approve.php?id=<?php echo $res['ride_id']?>" style="color: green;">ACCEPT</a>
  
    <a href="canceladmin.php?id=<?php echo $res['ride_id']?>" style="color: red;">REJECT</a></td>
  
    </tr>  
<?php
    }
?>


<?php
echo "</table>";
?>



<?php
session_start();
?>
<?php
extract($_POST);
echo "<h2> Completed  rides</h2>";
$db=new mysqli('localhost','root','','cedcab');

$q="select * from tb_ride where status=1 and customer_user_id=$_SESSION[id]  ";

$query=mysqli_query($db,$q);

$completed=mysqli_num_rows($query);

$_SESSION['completed']=$completed;
echo "<table  id='table_id' class='display' >";
echo "<thead>";
echo "<tr style='font-size:20px; text-align:center;background-color:#cdea9f;'>";
echo "<th>Date</th><th>from</th><th>To</th><th>Cab_type</th><th>Total_distance</th><th>Total_fair</th><th>Luggage</th><th>Status</th>";
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
    <td><?php echo "completed";?></td>
    
  
  
    </tr>  
<?php
    }
    echo "</tbody>";
?>


<?php

echo "</table>";
?>


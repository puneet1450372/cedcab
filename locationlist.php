<?php
 echo "<h1>Available Locations</h1>";
$con =new mysqli('localhost','root','','cedcab') or die('connection unsuucessful');
$selectquery= "select *from location ";

$query=mysqli_query($con,$selectquery);

$nums=mysqli_num_rows($query);

echo "<table border='1px' cellpadding='5px' cellspacing='0px' width='100%';>";
echo "<tr style='font-size:20px; text-align:center;background-color:#cdea9f;'>";
echo "<th>LOCATION</th><th>DISTANCE</th><th>IS_Available</th><th>ACTION</th>";
echo "</tr>";

while(
    $res=mysqli_fetch_array($query)){
 ?>
    <tr style="font-size:15px; ">
   
   
    <td><?php echo $res['name'];?></td>
    <td><?php echo $res['distance'];?></td>
    <td><?php echo "Available";?></td>
    
    <td><a href="editloc.php?id=<?php echo $res['id']?>">Edit</i></a>
    
    <a href="locdel.php?id=<?php echo $res['id']?>">Delete</a></td>
   </tr>  
<?php
    }
?>


<?php
echo "</table>";
?>


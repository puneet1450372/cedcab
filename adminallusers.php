<?php

echo "<h2>ALL USERS</h2>";

$db=new mysqli('localhost','root','','cedcab');

$q="select * from signup ";

$query=mysqli_query($db,$q);

echo "<table border='1px' cellpadding='5px' cellspacing='0px' width='100%';>";
echo "<thead>";
echo "<tr style='font-size:20px; text-align:center;background-color:#cdea9f;'>";
echo "<th>Name</th><th>Email</th><th>Mobile</th><th>Date of joining</th><th>Action</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while(
    $res=mysqli_fetch_array($query)){
 ?>
    <tr style="font-size:15px; ">
   
    <td><?php echo $res['name'];?></td>
    <td><?php echo $res['email'];?></td>
    <td><?php echo $res['mobile'];?></td>
    <td><?php echo $res['dateofsign'];?></td>
    <td><button><a href="block.php?id=<?php echo $res['id']?>">Block</a></button>
 
    <button style="display: ;"> <a href="unblock.php?id=<?php echo $res['id']?>">unBlock</a></button>
     </td>
    </tr>  
<?php
    }
    echo "</tbody>";
?>


<?php
echo "</table>";
?>


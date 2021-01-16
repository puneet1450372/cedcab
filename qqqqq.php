<?php
  extract($_POST);
//   SELECT * FROM Customers
// ORDER BY CustomerName ASC;
$con =new mysqli('localhost','root','','task') or die('connection unsuucessful');

$db=new mysqli('localhost','root','','task');

$q="select *from taskdata ORDER BY $_POST[column] $_POST[sort]";

mysqli_query($db,$q) or die('Query unsuucessful');

$output= ' ';
if(isset($_POST["query"]))
{
$search=mysqli_real_escape_string($con,$_POST["query"]);

$query="select *from taskdata
WHERE id LIKE '%".$search."%'
OR pname LIKE '%".$search."%'
OR email LIKE '%".$search."%'
OR sname LIKE '%".$search."%'
OR sgender LIKE '%".$search."%'
OR sbirthday LIKE '%".$search."%'
OR cnumber LIKE '%".$search."%'
OR Tnumber LIKE '%".$search."%'
OR address LIKE '%".$search."%'
OR city LIKE '%".$search."%'
OR zip LIKE '%".$search."%'
";}
else{
  $query="select * from taskdata";
}
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result)>0){

$output .='
 <table border="1px" cellpadding="5px" cellspacing="0px"; background-color:#ddd;>

<th>id</th><th>ParentName</th><th>Email</th><th>Student Name</th><th>Studentgender</th><th>Student Birthday</th><th>Student Contact</th><th>Status</th><th>Address</th><th>City</th><th>ZipCode</th><th>update</th><th>Delete</th>
';

while(
    $res=mysqli_fetch_array($result)){
      $output.='

    <tr>
    <td>'.$res['id'].'</td>
    <td>'.$res['pname'].'</td>
    <td>'.$res['email'].'</td>
    <td>'.$res['sname'].'</td>
    <td>'.$res['sgender'].'</td>
    <td>'.$res['sbirthday'].'</td>
    <td>'.$res['cnumber'].'</td>
    <td>'.$res['Tnumber'].'</td>
    <td>'.$res['address'].'</td>
    <td>'.$res['city'].'</td>
    <td>'.$res['zip'].'</td>
    
    <td><a href="update.php?id='.$res['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
    
    <td><a href="delete.php?id='.$res['id'].'"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
</tr>';


    }
echo $output;
 
?>

<?php
}
echo "</table>";

  

?>


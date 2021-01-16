
  <?php
  extract($_POST);
$con =new mysqli('localhost','root','','cedcab') or die('connection unsuucessful');
$output= ' ';
if(isset($_POST["query"]))
{
$search=mysqli_real_escape_string($con,$_POST["query"]);

$query="select *from signup
WHERE id LIKE '%".$search."%'
OR name LIKE '%".$search."%'
OR email LIKE '%".$search."%'
OR dateofsign LIKE '%".$search."%'
OR mobile LIKE '%".$search."%'
OR status LIKE '%".$search."%'

";}
else{
  $query="select * from signup";
}
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result)>0){

$output .='
 <table border="1px" cellpadding="5px" cellspacing="0px"; background-color:#ddd;>

<th>id</th><th>Email</th><th>name</th><th>Date of sign</th><th>mobile</th><th>status</th><th>update</th><th>Delete</th>
';

while(
    $res=mysqli_fetch_array($result)){
      $output.='

    <tr>
    <td>'.$res['id'].'</td>
    <td>'.$res['email'].'</td>
    <td>'.$res['name'].'</td>
    <td>'.$res['dateofsign'].'</td>
    <td>'.$res['mobile'].'</td>
    <td>'.$res['status'].'</td>
    
    
    <td><a href="adminedit.php?id='.$res['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
    
    <td><a href="delete.php?id='.$res['id'].'"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
</tr>';


    }
echo $output;
 
?>

<?php
}
else{
  echo "data not found";
}
echo "</table>";

  

?>


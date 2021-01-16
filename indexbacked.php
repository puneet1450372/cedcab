<?php
$locations = array("charbhag"=>0,"indiranagar"=>10, "BBD"=>30,"Barabanki"=>60, "Faizabad"=>100,"Basti"=>150,"Gorakhpur"=>210);  
 
extract($_POST);
 if($pickup=="Choose your pickup point")  
{
    echo "please choose pickup location"."<br>";
  
}
elseif( $drop=="Choose your drop point")
{
	echo "please choose drop location"."<br>";
  

}
elseif($type=="Choose your Car type"){
	echo "please choose  cab type"."<br>";
  
}
else{
$distt = abs($locations[$pickup]-$locations[$drop]);
echo "<b>From</b> :".$pickup."<br>";
echo "<b>TO</b> :".$drop."<br>";
echo "<b>Cab type</b> :".$type."<br>";
 echo "<b> distance</b> :".$distt."KM <br>";

 $cab=new cedcab();

if($type=="CedMicro"){
   $cab->cedmicro($distt);
   echo "<button><a href='login.php'>BOOK CAB</a></button>";
}
if($type=="CedMini"){
    $cab->cedmini($distt);
    echo "<button><a href='login.php'>BOOK CAB</a></button>";
}
if($type=="CedRoyal"){
    $cab->cedroyal($distt);
    echo "<button><a href='login.php'>BOOK CAB</a></button>";
}
if($type=="CedSUV"){
    $cab->cedSUV($distt);
    echo "<button><a href='login.php'>BOOK CAB</a></button>";
}
}
//fare calculation FUNCTION for cedmicro cab for booking
class cedcab{
	public $price;
	public $Weight=0;
function cedmini($distt){
	global $lprice,$Weight;
	if( $distt>0 && $distt<=10)
	{
	$price=$distt*14.5;
	}
	elseif ($distt>10 && $distt<=60)
	 {
 	$distt_new= $distt-10;
	$price=$distt_new*13+145;
	}
	elseif ($distt>60 && $distt<=160)
	 {
	$distt_new1=$distt-60;
	$price=($distt_new1*11.20)+795;
	}
	elseif($distt>160)
	{
	$new_distt=$distt-160;
	$price=1915+$new_distt*9.5;
	}
    luggage($Weight);
   $x=$lprice+$price+150;
   echo "<b>luggage Weight</b> :".$Weight."Kg<br>";
	echo "<b>Total fare</b>: $x Rs/-<br>";
	
}
//fare calculation FUNCTION for cedmiNI cab for booking
function cedmicro($distt){
	
	if( $distt>0 && $distt<=10)
	{
	$price=$distt*13.5;}
	elseif ($distt>10 && $distt<=60)
	 {
	$distt_new= $distt-10;
	$price=$distt_new*12+135;}
	elseif ($distt>60 && $distt<=160)
	 {
	$distt_new1=$distt-60;
	$price=($distt_new1*10.20)+735;
	}
	elseif($distt>160)
	{
	$new_distt=$distt-160;
	$price=1755+$new_distt*8.5;
	}
	echo " <b>Total fare</b>:".($price+50)."/-Rs<br>";
}
//fare calculation FUNCTION for cedrrOYAL cab for booking
function cedroyal($distt){
	global $lprice,$Weight;
 	if( $distt>0 && $distt<=10)
	{
	$price=$distt*15.5;}
	elseif ($distt>10 && $distt<=60)
	 {
	$distt_new= $distt-10;
	$price=$distt_new*14+155;
	}
	elseif ($distt>60 && $distt<=160)
	 {
	$distt_new1=$distt-60;
	$price=($distt_new1*12.20)+855;
	}
	elseif($distt>160)
	{
	$new_distt=$distt-160;
	$price=2075+$new_distt*10.5;
	}
    luggage($Weight);
	$x=$lprice+$price+200;
	echo "<b>luggage Weight</b> :".$Weight."Kg<br>";
	echo "<b>Total fare</b>: $x Rs/-<br>";
 }
//fare calculation FUNCTION for cedsuv cab for booking
function cedSUV($distt){
   global $lprice,$Weight;
        if( $distt>0 && $distt<=10)
        {
        $price=$distt*16.5;
        }
        elseif ($distt>10 && $distt<=60)
        {
        $distt_new= $distt-10;
        $price=$distt_new*15+165;
        }
        elseif ($distt>60 && $distt<=160)
        {
        $distt_new1=$distt-60;
        $price=($distt_new1*13.20)+915;
        }
        elseif($distt>160)
        {
        $new_distt=$distt-160;
        $price=2235+$new_distt*11.5;
        }
        luggage($Weight);
		$x=2*$lprice+$price+250;
		echo "<b>luggage Weight</b> :".$Weight."Kg<br>";
        echo "<b>Total fare</b>: $x Rs/-<br>";
}
}
function luggage($Weight){
	global $lprice,$price;
	if ($Weight>0 && $Weight<=10){
		$lprice=50;}
	elseif($Weight>10 && $Weight<=20){
		$lprice=100;
	}
	elseif ($Weight>20) {
		$lprice=200; }
	

}
?>

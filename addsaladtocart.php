<?php

require_once("Config.php");
require_once("Salad.Class.php");

$salad = new Salad();
$saladnames = $_POST["saladstoreturn"];
$allsalads = array();
$temp = "";
for($i = 0; $i<strlen($_POST["saladstoreturn"]);$i++) 
if($_POST["saladstoreturn"][$i]!= ",") $temp .= $_POST["saladstoreturn"][$i];
else
{
	array_push($allsalads, $temp);
	$temp = "";
}
array_push($allsalads, $temp);
	$temp = "";
	
for($i = 0; $i < count($allsalads); $i++)
{
echo('<html><h1>Name: '.$allsalads[$i].'</h1></html>');
echo('<h1>Quanity: '.$_POST["quanity".$allsalads[$i]].'</h1>');
echo ('<h1>Price: '.$salad->getPriceByName($allsalads[$i]).'</h1>');
}

array_push($_SESSION['cart'], $price); 





<?php

require_once("Config.php");
require_once("Other.Class.php");
require_once("Cart.Class.php");


$strombolli = new Other();
$strombollinames = $_POST["strombollistoreturn"];
$allstrombollis = array();
$temp = "";
for($i = 0; $i<strlen($_POST["strombollistoreturn"]);$i++) 
if($_POST["strombollistoreturn"][$i]!= ",") $temp .= $_POST["strombollistoreturn"][$i];
else
{
	array_push($allstrombollis, $temp);
	$temp = "";
}
array_push($allstrombollis, $temp);
	$temp = "";

$cart = new Cart();	
for($i = 0; $i < count($allstrombollis); $i++)
{
	$name = $allstrombollis[$i];
	$quanity = $_POST["quanity".$allstrombollis[$i]];
	$price = $strombolli->getPricelByName($allstrombollis[$i])*$quanity;
echo('<html><h1>Name: '.$name.'</h1></html>');
echo('<h1>Quanity: '.$quanity.'</h1>');
echo ('<h1>Price: '.$price.'</h1>');

$cart->addPrice($price);
$cart->addName($name);
$cart->addSize("regular");
$cart->addDescription("strombolli");
$cart->addQuanity($quanity);
}

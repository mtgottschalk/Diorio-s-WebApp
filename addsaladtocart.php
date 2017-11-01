<?php

require_once("Config.php");
require_once("Salad.Class.php");
require_once("Cart.Class.php");

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

$cart = new Cart();	
for($i = 0; $i < count($allsalads); $i++)
{
echo('<html><h1>Name: '.$allsalads[$i].'</h1></html>');
echo('<h1>Quanity: '.$_POST["quanity".$allsalads[$i]].'</h1>');
echo ('<h1>Price: '.$salad->getPriceByName($allsalads[$i]).'</h1>');

$cart->addPrice($salad->getPriceByName($allsalads[$i]));
$cart->addName($allsalads[$i]);
$cart->addSize("regular");
$cart->addDescription("Salad");
$cart->addQuanity($_POST["quanity".$allsalads[$i]]);

var_dump($_SESSION["cart"]["prices"]);
var_dump($_SESSION["cart"]["sizes"]);
var_dump($_SESSION["cart"]["names"]);
var_dump($_SESSION["cart"]["descriptions"]);

}







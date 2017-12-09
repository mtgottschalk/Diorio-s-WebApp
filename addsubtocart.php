<?php

require_once("Config.php");
require_once("Sub.Class.php");
require_once("Cart.Class.php");
require_once("session.class.php");

$ec = false;
$sub =  new Sub();
$name = $_POST["name"];
$size = $_POST["size"];
$price = 0.0;
$toppings = $_POST["allsubtoppings"];
echo($toppings);
$quanity = $_POST["quanity"];
if($size=="Half")
{
	$addprice = .25;
	$price = $sub->getSubPriceHalf($name);
	echo($price);
}
if($size=="Full")
{
	$addprice = .50;
	$price = $sub->getSubPriceFull($name);
	echo($price);
}
echo($addprice);
$alltoppings = array();
$temp = "";
for($i = 0; $i<strlen($_POST["allsubtoppings"]);$i++) 
if($_POST["allsubtoppings"][$i]!= ",") $temp .= $_POST["allsubtoppings"][$i];
else
{
	array_push($alltoppings, $temp);
	if($temp == "extracheese")
	{
		 $price+= $addprice;
		 echo("extracheese");
	 }
	if($temp == "hotpeppers")
	{
		 $price+= $addprice;
		 echo("hotpeppers");
	 }
	if($temp == "sweetpeppers") 
	{
		 $price+= $addprice;
		 echo("sweetpeppers");
	 }
	$temp = "";
}
if($temp == "extracheese")
	{
		 $price+= $addprice;
		 echo("extracheese");
	 }
	if($temp == "hotpeppers")
	{
		 $price+= $addprice;
		 echo("hotpeppers");
	 }
	if($temp == "sweetpeppers") 
	{
		 $price+= $addprice;
		 echo("sweetpeppers");
	 }
echo ('Name = '.$name.'</br>');
echo ('Price = '.$price.'</br>');
echo ('Size = '.$size.'</br>');
echo ('Quanity = '.$quanity.'</br>');

$cart = new Cart();

$cart->addPrice($price);
$cart->addName($name);
$cart->addDescription("Sub w/".$toppings);
$cart->addQuanity($quanity);


var_dump($_SESSION["cart"]["prices"]);
var_dump($_SESSION["cart"]["names"]);

//header('Location: ./menu1.php');





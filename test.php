<?php
require_once("Config.php");
require_once("Pizza.class.php");
$pizza = new Pizza();
$name = $pizza->getNameByToppings($_POST["pizzaselect"]);
$price = 0.0;
//echo($_POST["pizzaselect"]);
//echo($_POST["size"]);
if($_POST["size"]=="slice")$price = $pizza->getPriceslByName($name);
else if($_POST["size"]=="small")$price = $pizza->getPricesByName($name);
else if($_POST["size"]=="medium")$price = $pizza->getPricembyName($name);
else $price = $pizza->getPricelByName($name);

echo ('<h1>Size = '.$_POST["size"].'</h1></html>');
echo ('<h1>Name = '.$name.'</h1>');
 echo ('<h1>Initial toppings = '.$_POST["pizzaselect"].'</h1>');
 echo ('<h1>Actual toppings = '.$_POST["alltoppings"].'</h1>');
echo ('<html><h1>Price = '.$price.'</h1>');
var_dump($_POST);

$alltoppings = array();
$initialtoppings = array();
$temp = "";
for($i = 0; $i<strlen($_POST["alltoppings"]);$i++) 
if($_POST["alltoppings"][$i]!= ",") $temp .= $_POST["alltoppings"][$i];
else
{
	array_push($alltoppings, $temp);
	$temp = "";
}
array_push($alltoppings, $temp);
	$temp = "";
	
	$initialtoppings = array();
$temp = "";
for($i = 0; $i<strlen($_POST["pizzaselect"]);$i++) 
if($_POST["pizzaselect"][$i]!= " ") $temp .= $_POST["pizzaselect"][$i];
else
{
	array_push($initialtoppings, $temp);
	$temp = "";
}
array_push($initialtoppings, $temp);
	$temp = "";
	
$count = 0;
for($i=0; $i < count($alltoppings);$i++)
for($j=0; $j < count($initialtoppings);$j++)
if($initialtoppings[$j] == $alltoppings[$i]) $count++;
$additionaltoppings = count($alltoppings) - $count;
echo('Number of additional toppings = '.$additionaltoppings);
?>

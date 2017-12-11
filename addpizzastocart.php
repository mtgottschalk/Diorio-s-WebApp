<?php
require_once("Config.php");
require_once("Pizza.class.php");
require_once("Cart.Class.php");

$pizza = new Pizza();
$name = $pizza->getNameByToppings($_POST["pizzaselect"]);
$price = 0.0;
$addprice = 0.0;
$quanity = $_POST["quanity"];
//echo($_POST["pizzaselect"]);
//echo($_POST["size"]);
if($_POST["size"]=="slice")
{
	$price = $pizza->getPriceslByName($name);
	$addprice = .25;
}
else if($_POST["size"]=="small")
{
	$price = $pizza->getPricesByName($name);
	$addprice = .5;
}
else if($_POST["size"]=="medium")
{
	$price = $pizza->getPricembyName($name);
	$addprice = 1;
}
else
{
	$price = $pizza->getPricelByName($name);
	$addprice = 1.50;
}

$price = $price*$quanity;
$ec = false;


echo ('<h1>Size = '.$_POST["size"].'</h1></html>');
echo ('<h1>Name = '.$name.'</h1>');
// echo ('<h1>Initial toppings = '.$_POST["pizzaselect"].'</h1>');
 echo ('<h1>toppings = '.$_POST["alltoppings"].'</h1>');
echo ('<html><h1>Price before toppings= '.$price.'</h1>');
var_dump($_POST);

$alltoppings = array();
$temp = "";
for($i = 0; $i<strlen($_POST["alltoppings"]);$i++)
if($_POST["alltoppings"][$i]!= ",") $temp .= $_POST["alltoppings"][$i];
else
{
	array_push($alltoppings, $temp);
	if($temp == "Extra Cheese") $ec = true;
	$temp = "";
}
array_push($alltoppings, $temp);
if($temp == "Extra Cheese") $ec = true;
	$temp = "";
 if($ec == true) $price += $addprice;
if(count($alltoppings)>= 4) $price += $addprice *4;
else { if(ec == true) $price += count($alltoppings)-1 * $addprice;
	else $price += count($alltoppings) * $addprice;
}

echo('Number of toppings = '.$alltoppings);

$cart = new Cart();
echo ('<html><h1>Price after toppings= '.$price.'</h1>');
$cart->addPrice($price);
$cart->addName($name);
$cart->addDescription('Pizza w/'.$_POST["alltoppings"]);
$cart->addQuanity($quanity);
header('Location: ./menu.php');
//$cart->addQuanity($quanity);

//header('Location: ./menu1.php');
//.5 sm 1 med 1.50 large pizza extra cheese always costs
//.25 half .50 full subs
//
/*$temp = "";
for($i = 0; $i<strlen($_POST["pizzaselect"]);$i++)
if($_POST["pizzaselect"][$i]!= ",") $temp .= $_POST["pizzaselect"][$i];
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
*/
?>

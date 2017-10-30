<?php

require_once("Config.php");
require_once("Sub.Class.php");
require_once("Cart.Class.php");
require_once("session.class.php");


$sub =  new Sub();
$name = $_POST["name"];
$size = $_POST["size"];
$price = 0.0;
$quanity = $_POST["quanity"];
if($size=="Half")$price = $sub->getSubPriceHalf($name);
if($size=="Full")$price = $sub->getSubPriceFull($name);

echo ('Name = '.$name.'</br>');
echo ('Price = '.$price.'</br>');
echo ('Size = '.$size.'</br>');
echo ('Quanity = '.$quanity.'</br>');

$cart = new Cart();

$cart->addPrice($price);
$cart->addName($name);
$cart->addDescription("Sub ");



var_dump($_SESSION["cart"]["prices"]);
var_dump($_SESSION["cart"]["names"]);





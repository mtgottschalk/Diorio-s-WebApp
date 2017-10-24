<?php

require_once("Config.php");
require_once("Sub.Class.php");

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

array_push($_SESSION['cart'], $price); 

echo $_SESSION['cart'][0];





<?php

require_once("Config.php");
require_once("Other.Class.php");
require_once("Cart.Class.php");
require_once("session.class.php");

$other = new Other();
$cart = new Cart();
$numberofrolltypes = $_POST["numberofrolltypes"];
echo($numberofrolltypes);
for($i=0; $i< $numberofrolltypes; $i++)
{
$name = $_POST['name'.$i.''];
$quanity = $_POST['rollsquanity'.$i.''];
if( $quanity!= 0 || $quanity != NULL)
{
$price = ($_POST['price'.$i.'']*$_POST['rollsquanity'.$i.'']);
$description = $_POST['description'.$i.''];
echo ('Name = '.$name.'</br>');
echo ('Price = '.$price.'</br>');
echo ('Quanity = '.$quanity.'</br>');
echo('Description = '.$description.'</br>');



$cart->addPrice($price);
$cart->addName($name);
$cart->addDescription($description);
$cart->addQuanity($quanity);
}
}

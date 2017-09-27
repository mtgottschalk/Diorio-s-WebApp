<?php 
	require_once("Pizza.Class.php");
	require_once("Config.php");
	
	$pizza = new Pizza();
	var_dump($pizza->getAllPizzas());
	?>

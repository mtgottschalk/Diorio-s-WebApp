<?php 
	require_once("Pizza.Class.php");
	require_once("Sub.Class.php");
	require_once("Salad.Class.php");
	require_once("Toppings.Class.php");
	require_once("Config.php");
	
	$pizza = new Pizza();
	$allpizzas = array();
	$allpizzas = $pizza->getAllPizzas();
	echo $allpizzas[2]["Name"];
	
	$topping = new Topping();
	$alltoppings = array();
	$alltoppings = $topping->getAllToppings();
	$id = 1;
	while(!empty($alltoppings[$id]))
	{
	echo("<html><h1>".$alltoppings[$id]["name"]."</h1></html>");
	$id++;
	
}
	
	$sub = new Sub();
	$allsubs = array();
	$allsubs = $sub->getAllSubs();
	var_dump($allsubs);
	echo $allsubs[1]["Name"];
	echo("<html></br></html>");
	
	$salad = new Salad();
	$allsalads = array();
	$allsalads = $salad->getAllSalads();
	echo $allsalads[1]["Name"];
	?>

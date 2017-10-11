<?php
require_once("Config.php");

Class Pizza
{
	function __construct()
	{
		$id = null;
		$name = "some name";
		$description = "some description";
		$prices = 0.0;
		$pricem = 0.0;
		$pricel = 0.0;
		$pricesl = 0.0;
	}
	function savePizza($id, $name, $prices, $pricem, $pricel, $pricesl, $description)
	{
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO pizza (`id`, `name`, `prices`, `pricem`, `pricel`, `pricesl`, `description`) VALUES(:id, :name, :prices, :pricem, :pricel, :pricesl, :description)");
		$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':prices'=>$prices, ':pricem'=>$pricem, ':pricel'=>$pricel, ':pricesl'=>$pricesl, ':description'=>$description));
		echo "result: $result\n";
		return $result;
	}
	function getAllPizzas()
	{
		global $pdo;
		$id = 1;
		$row = 1;
		$allpizzas = array();
		while($row!=null)
		{
		$stmt = $pdo->prepare("SELECT * from pizza WHERE id=:id");
		$result = $stmt->execute(array(':id'=>$id));
		$row = $stmt->fetch();
		
			$allpizzas[$id] = $row;
		
		$id+=1;
	}
		return $allpizzas;
	}
	function getPizzabyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
	function getPricesbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT prices FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
	function getPricembyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT pricem FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
	function getPricelbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT pricel FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
		
}

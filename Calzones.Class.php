<?php
require_once("Config.php");

Class Calzone
{
	function __construct()
	{
		$id = null;
		$name = "some name";
		$description = "some description";
		$prices = 0.0;
		$pricel = 0.0;
		$fillings = "";
	}
	/*NEED FUNCTION GET PRICE BY SIZE*/
	function saveCalzone($id, $name, $prices, $pricel, $description, $fillings)
	{
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO calzones (`id`, `name`, `prices`, `pricesl`, `description`, `fillings`) VALUES(:id, :name, :prices, :pricesl, :description, :fillings)");
		$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':prices'=>$prices, ':pricem'=>$pricem, ':pricel'=>$pricel, ':pricesl'=>$pricesl, ':description'=>$description, ':fillings' =>$fillings));
		echo "result: $result\n";
		return $result;
	}
	function getFillingsByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT fillings FROM calzones WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
	function getNameByFillings($toppings)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT name FROM calzones WHERE fillings=:fillings");
		$result = $stmt->execute(array(':toppings'=>$toppings));
		return $stmt->fetchColumn();
		
	}
	function getAllCalzones()
	{
		global $pdo;
		$id = 1;
		$row = 1;
		$allcalzones = array();
		while($row!=null)
		{
		$stmt = $pdo->prepare("SELECT * from calzones WHERE id=:id");
		$result = $stmt->execute(array(':id'=>$id));
		$row = $stmt->fetch();
		
			$allcalzones[$id] = $row;
		
		$id+=1;
	}
		return $allcalzones;
	}
	function getCalzonebyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM calzones WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetch();
	}
	function getPricesbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT prices FROM calzones WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getPricelbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT pricel FROM calzones WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getCalzoneFillings($fillings)
	{
		$temp = "";
		$allfillings = array();
	for($i = 0; $i < strlen($fillings); $i++)
	{
		if($fillings[$i] != " ")
		{
		$temp .= $fillings[$i];
	}
		else 
		{array_push($allfillings, $temp);
		$temp = "";
	}
	}
	return $allfillings;	
}

}

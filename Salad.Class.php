<?php 

require_once("Config.php");

Class Salad
{
function __cunstruct()
{
	$id = null;
	$name = "some name";
	$price = 0.0;
	$description = "some description";
}
function SaveSalad($id, $name, $price, $description)
{
	global $pdo;
	$stmt = $pdo->prepare("INSERT INTO salads(`id`, `name`, `price`, `description`)VALUES(:id, :name, :price, :description)");	
	$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':price'=>$price, ':description'=>$description));
    return $result;
}
function getSaladByName($name)
{
	global $pdo;
	$stmt = $pdo->prepare("SELECT * FROM salads WHERE name=:name");
	$result = $stmt->execute(array(':name'=>$name));
	var_dump($stmt->fetch());
	return $result;
}
function getPriceByName($name)
{
	global $pdo;
	$stmt = $pdo->prepare("SELECT price FROM salads WHERE name=:name");
	$result = $stmt->execute(array(':name'=>$name));
	return $stmt->fetchColumn();
	 
}
function getAllSalads()
	{
		$allsalads = array();
		$row = 1;
		$id = 1;
		global $pdo;
		while($row != null)
		{
			$stmt = $pdo->prepare("SELECT * FROM salads WHERE id=:id");
			$result = $stmt->execute(array(':id'=>$id));
			$row = $stmt->fetch();
			$allsalads[$id]= $row;
			$id++;
	}
	return $allsalads;
	}
}

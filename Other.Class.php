<?php

require_once("Config.php");

Class Other
{
	function __construct()
	{
		$id = 0;
		$name = "some name";
		$type = "type";
		$prices = 0.0;
		$pricel = 0.0;
		$description = "blah";
	}
	function SaveOther($id, $name, $type, $prices, $pricel, $description)
	{
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO other (`id`, `name`,`type`, `prices`, `pricel`, `description`) VALUES ( :id, :name, :type, :prices, :pricel, :description)");
		$result = $stmt->execute(array(':id'=>$id, ':name'=>$name,':type'=>$type, 'prices'=>$prices, 'pricel'=>$pricel, 'description'=>$description));
		return $result;
	}
	function getTypeByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT type FROM other WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
	function getOtherByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM other WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
	function getPricesByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT prices FROM other WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetch();
	}
	function getPricelByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT pricel FROM other WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetch();
	}
	function getAllOther()
	{
		$allother = array();
		$row = 1;
		$id = 1;
		global $pdo;
		while($row != null)
		{
			$stmt = $pdo->prepare("SELECT * FROM other WHERE id=:id");
			$result = $stmt->execute(array(':id'=>$id));
			$row = $stmt->fetch();
			$allother[$id]= $row;
			$id++;
	}
	return $allother;
}
	
}

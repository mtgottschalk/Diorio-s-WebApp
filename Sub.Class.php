<?php
require_once("Config.php");

Class Sub
{
	function __construct()
	{
		$id = null;
		$name = "some name";
		$description = "some description";
		$pricef = 0.0;
		$priceh = 0.0;
		$temp = "none";
		
	}
	
function SaveSub($id, $name, $pricef, $priceh, $description, $temp)
	{
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO subs (`id`, `name`, `pricef`, `priceh`, `description`, `temp`) VALUES(:id, :name, :pricef, :priceh, :description, :temp)");
		$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':pricef'=>$pricef, ':priceh'=>$priceh, ':description'=>$description, ':temp'=>$temp));
		echo "result: $result\n";
		return $result;
	}
	function getSubByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM subs WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
	function getSubPriceFull($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT pricef FROM subs WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getSubPriceHalf($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT priceh FROM subs WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getAllSubs()
	{
		$allsubs = array();
		$row = 1;
		$id = 1;
		global $pdo;
		while($row != null)
		{
			$stmt = $pdo->prepare("SELECT * FROM subs WHERE id=:id");
			$result = $stmt->execute(array(':id'=>$id));
			$row = $stmt->fetch();
			$allsubs[$id]= $row;
			$id++;
	}
	return $allsubs;
	}

		
}

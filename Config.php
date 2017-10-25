<?php
require_once("session.class.php");

$session = new Session();

$host = "localhost";
$user = "root";
$pass = "";
$db = "diorios";
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
	PDO::ATTR_ERRMODE                  =>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE       =>PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES         =>false,  
];

$pdo = new PDO($dsn, $user, $pass, $opt);




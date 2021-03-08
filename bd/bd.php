<?php

function listProducts()
{
	$servername = "localhost";
	$username = "usuario";
	$password = "usuario";
	$myDB = "BDTienda";
	$result = array();
	try {
		$conn = new PDO("mysql:host=$servername:3306;dbname=$myDB", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM productos");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	return $result;
}

function getPassword($usuario)
{
	$servername = "localhost";
	$username = "usuario";
	$password = "usuario";
	$myDB = "BDTienda";
	$result = array();
	try {
		$conn = new PDO("mysql:host=$servername:3306;dbname=$myDB", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT password FROM usuarios where usuario = '$usuario'");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	return $result;
}

function createUser($usuario, $passwordUser)
{
	$servername = "localhost";
	$username = "usuario";
	$password = "usuario";
	$myDB = "BDTienda";

	try {
		$conn = new PDO("mysql:host=$servername:3306;dbname=$myDB", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("insert into usuarios (usuario, password) values ('$usuario', '$passwordUser')");
		$stmt->execute();
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

<?php

//Script dedicado a la interacción con la base de datos, si se necesita se puede cambiar el
//usuario y password para adaptarlo a la base de datos que utilice.

//Listado de productos
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

//Obtiene la contraseña del usuario
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

//Crea un nuevo usuario
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

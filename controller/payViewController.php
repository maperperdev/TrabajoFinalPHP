<?php
/**
 * Script que efectúa el cálculo del total a pagar.
 */
require_once "../model/CestaCompra.php";
session_start();

if (isset($_SESSION["shoppingCart"])) {
	$serializedObject = serialize($_SESSION["shoppingCart"]);
	$object =  unserialize($serializedObject);
	$info = "<h2>El precio a pagar es de " . $object->getTotalValue() . "</h2>";
	unset($_SESSION["shoppingCart"]);
} else {
	$info = "<h2>No tiene nada que pagar</h2>"; 
}
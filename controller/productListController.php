<?php
/**
 * Controlador que gestiona la creación del formulario de compra. Carga dinámicamente desde un
 * array de sesión al que se le vuelca el contenido de la base de datos.
 */
if (!isset($_SESSION["usuario"])) {
	header("Location: ../index.php");
}

if (!isset($_SESSION)) {
	session_start();
}

if (!isset($_SESSION["productsList"])) {
	session_start();
	$_SESSION["productsList"] = listProducts();
}

if (isset($_POST["submit"])) {
	$shoppingCart = array();
	for ($i = 0; $i < count($_SESSION["productsList"]); $i++) {
		$prodctID = "prod" . ($i + 1);
		if (isset($_POST[$prodctID]) && $_POST[$prodctID] > 0) {
			$codigo = $_SESSION["productsList"][$i]["codigo"];
			$nombre = $_SESSION["productsList"][$i]["nombre"];
			$nombre_corto = $_SESSION["productsList"][$i]["nombre_corto"];
			$precio = $_SESSION["productsList"][$i]["pvp"];
			$cantidad =  $_POST[$prodctID];
			$shoppingCart[] = new Producto($codigo, $nombre, $nombre_corto, $precio, $cantidad);
		}
	}
	if (count($shoppingCart) > 0) {
		if (isset($_SESSION["shoppingCart"])) {
			$serializedObject = serialize($_SESSION["shoppingCart"]);
			$object =  unserialize($serializedObject);
			$listProductsShoppingCart = $object->__get("arrayProductos");
			$finalShoppingCart = joinTwoListOfProducts($shoppingCart, $listProductsShoppingCart);
			$_SESSION["shoppingCart"] = new CestaCompra($finalShoppingCart);
		} else {
			$_SESSION["shoppingCart"] = new CestaCompra($shoppingCart);
		}
		header("Location: shoppingCartView.php");
	}
}
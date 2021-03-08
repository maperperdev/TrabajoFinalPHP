<?php
/**
 * Controlador de la cesta de la compra. Permite pagar, agregar más cantidad de producto y
 * borrar productos. Se debe pulsar el botón actualizar si se quiere que los productos 
 * actualizados se guarden.
 */
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
	$_SESSION["shoppingCart"] = new CestaCompra($shoppingCart);
} else if (isset($_POST["pagar"])) {
	header("Location: payView.php");
} else {
	if (isset($_SESSION["shoppingCart"])) {
		$serializedObject = serialize($_SESSION["shoppingCart"]);
		$object =  unserialize($serializedObject);
		$listProductsShoppingCart = $object->__get("arrayProductos");
		//Elimina un producto
		foreach ($listProductsShoppingCart as $key => $product) {
			if (isset($_POST["rm" . $product->__get("codigo")])) {
				unset($listProductsShoppingCart[$key]);
			}
		}
		//Si la lista de productos borrados llega a 0, borro la cesta de la sesión.
		if (count($listProductsShoppingCart) == 0) {
			unset($_SESSION["shoppingCart"]);
		} else {
			$_SESSION["shoppingCart"] = new CestaCompra($listProductsShoppingCart);
		}
	}
}
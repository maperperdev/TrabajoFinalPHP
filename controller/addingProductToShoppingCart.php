<?php
require_once "../model/Producto.php";
require_once "../model/CestaCompra.php";

//Suma las cantidades de productos de la cesta a los ya existentes
function addingExistingProducts($newProductsArray, $oldProductsArray) {
	$combinedArray = array();
	foreach ($newProductsArray as $newProduct) {
		foreach ($oldProductsArray as $oldProduct) {
			if ($newProduct["producto"]->__get("codigo") == $oldProduct["producto"]->__get("codigo")) {
				$combinedArray[] = array("cantidad" => $oldProduct["cantidad"] + $newProduct["cantidad"],
																"producto" => $oldProduct["producto"]);
			}
		}
	}
	return $combinedArray;
}

//Añade productos nuevos a la cesta
function addingNewProducts($newProductsArray, $oldProductsArray) {
	$combinedArray = array();
	foreach ($newProductsArray as $newProduct) {
		foreach ($oldProductsArray as $oldProduct) {
			if ($newProduct["producto"]->__get("codigo") == $oldProduct["producto"]->__get("codigo")) {
				break;
			}
		}
		$combinedArray[] = array("cantidad" => $newProduct["cantidad"], "producto" => $newProduct["producto"]);
	}
	foreach ($oldProductsArray as $oldProduct) {
		$combinedArray[] = $oldProduct;
	}
	return $combinedArray;
}

?>
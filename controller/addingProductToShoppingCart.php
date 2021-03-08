<?php
/**
 * Función que controla que no existan productos repetidos con el mismo id, si los encuentra suma
 * sus atributos cantidad. Se usa conjuntamente con la clase CestaCompra.
 */
require_once "../model/Producto.php";
require_once "../model/CestaCompra.php";

function joinTwoListOfProducts($productList1, $productList2)
{
	$combinedArray = array();
	foreach ($productList1 as $key1 => $product1) {
		foreach ($productList2 as $key2 => $product2) {
				if ($product1->__get("codigo") == $product2->__get("codigo")) {	
				$combinedArray[] = new Producto($product1->__get("codigo"), $product1->__get("nombre"),
				$product1->__get("nombre_corto"), $product1->__get("precio"),
				$product1->__get("cantidad") + $product2->__get("cantidad")); 
				unset($productList1[$key1]);
				unset($productList2[$key2]);
				$productList1 = array_values($productList1);
				$productList2 = array_values($productList2);
				break;
			}
		}
	}
	foreach ($productList1 as $product) {
		$combinedArray[] = $product;
	}
	foreach ($productList2 as $product) {
		$combinedArray[] = $product;
	}
	return $combinedArray;
}
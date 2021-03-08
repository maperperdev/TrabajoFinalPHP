<?php
require_once "Producto.php";

class CestaCompra {
	//Array asociativo con la siguiente estructura
	// $arrayProductos[0]["cantidad"] = "Número de productos con una determinada id"
	// $arrayProductos[0]["producto"] = "Productos con una determinada id"
	private $arrayProductos;

	public function __construct($arrayProductos) {
			$this->arrayProductos = $arrayProductos;
	}

	public function __get($property)
	{
		if (property_exists($this, $property)) {
			return $this->$property;
		}	
	}

	public function __set($property, $value)
	{
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}	
	}

	public function toTable() {
		$table = "<table class=\"table\"><thead><tr><th scope=\"col\">Codigo</th scope=\"col\"><th scope=\"col\">Nombre</th>"
			. "<th scope=\"col\">Precio</th><th scope=\"col\">Cantidad pedida</th><th></th></thead><tr>";
		foreach ($this->arrayProductos as $product) {
			$table .= "<tr><td>" . $product["producto"]->__get("codigo") . "</td><td>" . $product["producto"]->__get("nombre") 
			. "</td><td>" . $product["producto"]->__get("precio") . "</td><td>" . "<input type=\"number\" name=\"cant" 
			. $product["producto"]->__get("codigo") . "\" value=\""  . $product["cantidad"] 
			. "\"></td><td><input type=\"submit\" name=\"". "rm" . $product["producto"]->__get("codigo") 
			. "\" value=\"Eliminar\">" .  "</td><tr>";
		}
		$table .= "</table>";
		return $table;
	}

	public function getTotalvalue() {
		$value = 0;
		foreach ($this->arrayProductos as $product) {
			$value += $product["cantidad"] * $product["producto"]->__get("precio");
		}
		return $value;
	}

}


// 
//Suma las cantidades de productos de la cesta a los ya existentes
// function addingExistingProducts($newProductsArray, $oldProductsArray) {
// 	$combinedArray = array();
// 	foreach ($newProductsArray as $newProduct) {
// 		foreach ($oldProductsArray as $oldProduct) {
// 			if ($newProduct["producto"]->__get("codigo") == $oldProduct["producto"]->__get("codigo")) {
// 				$combinedArray[] = array("cantidad" => $oldProduct["cantidad"] + $newProduct["cantidad"],
// 																"producto" => $oldProduct["producto"]);
// 			}
// 		}
// 	}
// 	return $combinedArray;
// }

// //Añade productos nuevos a la cesta
// function addingNewProducts($newProductsArray, $oldProductsArray) {
// 	$combinedArray = array();
// 	foreach ($newProductsArray as $newProduct) {
// 		foreach ($oldProductsArray as $oldProduct) {
// 			if ($newProduct["producto"]->__get("codigo") == $oldProduct["producto"]->__get("codigo")) {
// 				break;
// 			}
// 		}
// 		$combinedArray[] = array("cantidad" => $newProduct["cantidad"], "producto" => $newProduct["producto"]);
// 	}
// 	foreach ($oldProductsArray as $oldProduct) {
// 		$combinedArray[] = $oldProduct;
// 	}
// 	return $combinedArray;
// }

// $producto1 = new Producto("1", "raton", "rat", 200);
// $producto2 = new Producto("2", "caja", "rat", 200);
// $producto3 = new Producto("3", "pantall", "rat", 200);

// $arrayProductos[] = array("cantidad" => 5, "producto" => $producto1);
// $arrayProductos[] = array("cantidad" => 2, "producto" => $producto2);
// $arrayProductos[] = array("cantidad" => 4, "producto" => $producto3);
// $cestaCompra = new CestaCompra($arrayProductos);
// echo "<h2>Primera Tabla</h2>";
// echo $cestaCompra->toTable();




// $arrayProductos1[] = array("cantidad" => 5, "producto" => $producto1);
// $arrayProductos1[] = array("cantidad" => 2, "producto" => $producto2);
// $arrayProductos1[] = array("cantidad" => 4, "producto" => $producto3);
// // print_r($arrayProductos);
// $arrayProductos = addingExistingProducts($arrayProductos1, $arrayProductos);
// $cestaCompra = new CestaCompra($arrayProductos);
// echo "<h2>Segunda Tabla</h2>";
// echo $cestaCompra->toTable();

// $producto4 = new Producto("6", "mando", "rat", 200);
// $arrayProductoNuevo[] = array("cantidad" => 9, "producto" => $producto4);
// // print_r($arrayProductoNuevo);
// // print_r($arrayProductos);

// $arrayProductos4 = addingNewProducts($arrayProductoNuevo, $arrayProductos);
// $cestaCompra = new CestaCompra($arrayProductos4);


// echo "<h2>Tercera Tabla</h2>";
// echo $cestaCompra->toTable();

// echo "<h3>Valor cesta de la compra " . $cestaCompra->getTotalValue();


// // $cestaCompra = new CestaCompra($arrayProductos);
// // echo "<h2>Segunda Tabla</h2>";
// // echo $cestaCompra->toTable();
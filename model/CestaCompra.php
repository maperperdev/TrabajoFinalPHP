<?php
/**
 * Clase CestaCompra que se encarga de gestionar las compras y generar los formularios para actualizar
 * los productos de la cesta como para borrarlo mediante un botón que se genera con el método toTable.
 */
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

	//Genera un formulario que se usará para borrar, actualizar las cantidades o pagar.
	public function toTable() {
		$table = "<table class=\"table\"><thead><tr><th scope=\"col\">Codigo</th scope=\"col\"><th scope=\"col\">Nombre</th>"
			. "<th scope=\"col\">Precio</th><th scope=\"col\">Cantidad pedida</th><th></th></thead><tr>";
		foreach ($this->arrayProductos as $product) {
			$table .= "<tr><td>" . $product->__get("codigo") . "</td><td>" . $product->__get("nombre") 
			. "</td><td>" . $product->__get("precio") . "</td><td>" . "<input type=\"number\" name=\"prod" 
			. $product->__get("codigo") . "\" value=\""  . $product->__get("cantidad") 
			. "\"></td><td><input type=\"submit\" name=\"". "rm" . $product->__get("codigo") 
			. "\" value=\"Eliminar\">" .  "</td><tr>";
		}
		$table .= "</table>";
		return $table;
	}
	//Calcula el valor total de la cesta
	public function getTotalvalue() {
		$value = 0;
		foreach ($this->arrayProductos as $product) {
			$value += $product->__get("cantidad") * $product->__get("precio");
		}
		return $value;
	}
}
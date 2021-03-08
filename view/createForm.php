<?php
if (!isset($_SESSION["listaProductos"])) {
	session_start();
	$_SESSION["listaProductos"] = listProducts();
}

	function createForm() {
		$table = "<table class=\"table\"><thead><tr><th scope=\"col\">Codigo</th scope=\"col\"><th scope=\"col\">Nombre</th><th scope=\"col\">Precio</th><th scope=\"col\">Cantidad pedida</th></thead><tr>";
		foreach ($_SESSION["listaProductos"] as $product) {
			$table .= "<tr><td>" . $product['codigo'] . "</td><td>" . $product["nombre"] 
			. "</td><td>" . $product["pvp"] . "</td><td>" . createInput($product["codigo"]) . "</td><tr>";
		}
		$table .= "</table>";
		return $table;
	}

	function createInput($id) {
		return "<input type=\"number\" name=\"prod$id\" min=\"0\" placeholder=\"Cantidad de producto\">";	
	}

?>
<?php
/* 
	Script que hace una copia de seguridad de la cesta de la compra si la hubiera.
	Hay que asegurarse de tener los permisos de escritura adecuados.
*/
session_start();
if (isset($_SESSION["shoppingCart"])) {
	file_put_contents("../backups/copiaCesta.txt", "");
	
	foreach ($_SESSION["shoppingCart"] as $product) {
		$serial = serialize($product);
		file_put_contents("../backups/copiaCesta.txt", $serial . "\n", FILE_APPEND);
	}
} else {
	echo "<h1>Nada que guardar</h1>";
	echo "<a href=\"../view/indexLogin.php\">Volver al menú</a>";
}

?>
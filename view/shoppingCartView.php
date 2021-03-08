<?php
require_once "../model/CestaCompra.php";
session_start();

if (!isset($_SESSION["shoppingCart"])) {
	echo "<h3>No hay productos en la cesta de la compra</h3>";
	return;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<?php echo $_SESSION["shoppingCart"]->toTable(); ?>
		<input type="submit" value="Actulizar cesta" name="submit">
	</form>
	<a href="indexLogin.php">Volver al menú</a>
</body>
</html>
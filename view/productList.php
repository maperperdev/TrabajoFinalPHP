<?php
require_once "../bd/bd.php";
require_once "createForm.php";
require_once "../model/CestaCompra.php";
require_once "../model/Producto.php";
require_once "../controller/addingProductToShoppingCart.php";

if (!isset($_SESSION["productsList"])) {
	session_start();
	$_SESSION["productsList"] = listProducts();
}

if (isset($_POST["submit"])) {
	$shoppingCart = array();
	for ($i = 0; $i < count($_SESSION["productsList"]); $i++) {
		$prodctID = "prod" . ($i+1);
		if (isset($_POST[$prodctID]) && $_POST[$prodctID] > 0) {
			$codigo = $_SESSION["productsList"][$i]["codigo"];
			$nombre = $_SESSION["productsList"][$i]["nombre"];
			$nombre_corto = $_SESSION["productsList"][$i]["nombre_corto"];
			$precio = $_SESSION["productsList"][$i]["pvp"];
			
			$product = new Producto($codigo, $nombre, $nombre_corto, $precio);
		 	$shoppingCart[] = array("cantidad" => $_POST[$prodctID], "producto" => $product);
		}
	}
	if (count($shoppingCart) > 0) {
		if (isset($_SESSION["shoppingCart"])) {
			print_r($shoppingCart);
			$shoppingCart = addingExistingProducts($shoppingCart, $_SESSION["shoppingCart"]);
			$shoppingCart = addingNewProducts($shoppingCart, $_SESSION["shoppingCart"]);
		}
		$_SESSION["shoppingCart"] = new CestaCompra($shoppingCart);
		header("Location: shoppingCartView.php");
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<h1 class="display-4 mt-5">Lista de productos</h1>
		<div class="row">
			<div class="col-10 text-center">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<?php
					echo createForm();
					?>
					<br>
			</div>
		</div>
		<div class="row">
			<div class="col-10 text-center mb-5">
				<input class="btn btn-primary btn-lg" type="submit" value="Agregar a la cesta" name="submit">
			</div>
		</div>
		</form>
	
	<a href="indexLogin.php">Volver al menú</a>
	</div>
</body>

</html>
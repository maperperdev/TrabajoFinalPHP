<?php
require_once "../model/Producto.php";
require_once "../model/CestaCompra.php";
require_once "../controller/addingProductToShoppingCart.php";

session_start();
include_once "../controller/shoppingCartValidation.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Cesta de la compra</title>
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-10 text-center my-5">
				<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<?php
					if (isset($_SESSION["shoppingCart"])) {
						echo $_SESSION["shoppingCart"]->toTable();
						echo "<input type=\"submit\" value=\"Actualizar cesta\" name=\"submit\">";
						echo "<input type=\"submit\" value=\"Pagar\" name=\"pagar\">";
					} else {
						echo "<h1>No hay productos en la cesta de compra</h1>";
					}
					?>

				</form>
				<a href="indexLogin.php">Volver al menú</a>
			</div>
		</div>
	</div>
</body>

</html>
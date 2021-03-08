<?php
require_once "../bd/bd.php";
require_once "../controller/createForm.php";
require_once "../model/CestaCompra.php";
require_once "../model/Producto.php";
require_once "../controller/addingProductToShoppingCart.php";
include_once "../controller/productListController.php";

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
		<h1 class="display-4 my-5">Lista de productos</h1>
		<div class="row">
			<div class="col-10 text-center">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
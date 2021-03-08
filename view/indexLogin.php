<?php
require_once "../bd/bd.php";
session_start();
if (!isset($_SESSION["usuario"])) {
	header("Location: ../index.php");
}
if (!isset($_SESSION["productsList"])) {
	$_SESSION["productsList"] = listProducts();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Página principal de la tienda</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<nav class="navbar bg-info">
			<div class="container-fluid">
				<div class="navbar-header">
						<h2>Tienda de productos</h2>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><span class="glyphicon glyphicon-user"><?php if (isset($_SESSION["usuario"])) echo $_SESSION["usuario"]; ?></span></li>
				</ul>
			</div>
		</nav>
		<div class="list-group">
			<a href="productList.php" class="list-group-item list-group-item-action">Listado de productos</a>
			<a href="shoppingCartView.php" class="list-group-item list-group-item-action">Cesta de la compra</a>
			<a href="#" class="list-group-item list-group-item-action">Logoff</a>
			<a href="#" class="list-group-item list-group-item-action">Copia de seguridad</a>
		</div>
	</div>
</body>

</html>
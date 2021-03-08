<?php
require_once "../utils/validationFunctions.php";
require_once "../bd//bd.php";
require_once "../exceptions/UserPasswordException.php";
$error = "";

if (isset($_SESSION["usuario"])) {
	header("Location: indexLogin.php");
	return;
}

if (isset($_POST["submit"])) {
	if (!isset($_POST["usuario"])) {
		$error .= "No introdujo ningún usuario";
	} else {
		$usuario = $_POST["usuario"];
	}
	if (!isset($_POST["password"])) {
		$error .= "No introdujo ningúna contraseña";
	} else {
		$password = $_POST["password"];
	}

	if (!isset($_POST["repeatedPassword"])) {
		$error .= "No introdujo la contraseña por duplicado";
	} else {
		$repeatedPassword = $_POST["repeatedPassword"];
	}

	if (strlen($error) == 0) {
		if (isset($password) && isset($repeatedPassword)) {
			if (strcmp($password, $repeatedPassword) != 0) {
				$error = "Las contraseñas no coinciden";
			} else {
				try {
					if (validatePassword($password)) {
						createUser($usuario, password_hash($password, PASSWORD_DEFAULT));
					} else {
						throw new UserPasswordException();
					}
				} catch (UserPasswordException $e) {
					echo $e->getMessage();
				}
			}
		}
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

			<div class="form-group">
				<label for="usuario">Usuario</label>
				<input class="form-control" type="text" name="usuario" placeholder="Usuario">
			</div>

			<div class="form-group">
				<label for="password">Introduzca contraseña</label>
				<input class="form-control" type="password" name="password" placeholder="Contraseña">
			</div>
			<div class="form-group">
				<label for="repeatedPassword">Repite la contraseña</label>
				<input class="form-control" type="password" name="repeatedPassword" placeholder="Vuelva a introducir su contraseña">
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="Enviar">
		<a class="btn btn-secondary" href="../index.php">Login</a>
		</form>

	</div>
</body>

</html>
<?php
require_once "bd/bd.php";
session_start();
$error = "";
//Si está se redirecciona a la página de inicio
if (isset($_SESSION["usuario"])) {
	header("Location: view/indexLogin.php");
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

	if (strlen($error) == 0) {
		$retrievedPassword = getPassword($usuario);
		if ($retrievedPassword == null) {
			$error = "No existe ese usuario";
			$resgistrar = "<a href=\"singup.php\">Regístrese</a>";
		} else {
			if (password_verify($password, $retrievedPassword[0]["password"])) {
				session_start();
				$_SESSION["usuario"] = $usuario;
				echo "hola";
				header("Location: view/indexLogin.php");
			} else {
				$resgistrar = "<a href=\"view/singup.php\">Regístrese</a>";
				$error .= "La contraseña es incorrecta";
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
				<label for="usuario">Introduzca contraseña</label>
				<input class="form-control" type="password" name="password" placeholder="Contraseña">
			</div>

			<input class="form-control" type="submit" name="submit" value="Enviar">
		</form>

		<div>
			<?php if (isset($resgistrar)) echo $resgistrar; ?>
		</div>


	</div>

</body>

</html>
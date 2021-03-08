<?php
require_once "../utils/validationFunctions.php";
require_once "../bd//bd.php";
require_once "../exceptions/UserPasswordException.php";
require_once "../utils/validationFunctions.php";
include_once "../controller/singupController.php";

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
		<div class="display-4">Formulario de registro</div>
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
			<input type="submit" class="btn btn-primary" name="submit" value="Registrarse">
			<a class="btn btn-secondary" href="../index.php">Login</a>
		</form>
		<div class="error">
			<?php if (isset($error)) echo $error; ?>
		</div>
		<div class="info">
			<?php if (isset($info)) echo $info; ?>
		</div>

	</div>
</body>

</html>
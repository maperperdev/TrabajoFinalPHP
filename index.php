<?php
include_once "controller/indexController.php";
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

	<div class="display-4 text-center my-5">Inicie sesión, por favor</div>

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
<?php
if (isset($_POST["submit"])) {
	session_start();
	session_destroy();
	header("Location: ../index.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cerrar sesión</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row text-center">
			<div class="display-4 my-5">Se dispone a abanonar la tienda</div>
			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<input class="btn btn-primary btn-lg" type="submit" name="submit" value="Cerrar sesión">
			</form>
		</div>
		<a href="indexLogin.php">Volver atrás</a>
	</div>
</body>

</html>
<?php
/**
 * Controlador que gestiona el registro de nuevos usuarios
 */
if (isset($_SESSION["usuario"])) {
	header("Location: indexLogin.php");
	return;
}

if (isset($_POST["submit"])) {
	$info = "";
	$error = "";
	$usuario = "";	
	$usuario = $_POST["usuario"];
	$password = "";
	$password = $_POST["password"];
	$repeatedPassword = "";
	$repeatedPassword = $_POST["repeatedPassword"];	
	
	if ($usuario == "") {
		$error .= "<p>No introdujo ningún usuario</p>";
	} 
	
	if ($password == "") {
		$error .= "<p>No introdujo ningúna contraseña</p>";
	} 	

	if ($repeatedPassword == "") {
		$error .= "<p>No introdujo la contraseña por duplicado</p>";
	}

	if (strlen($error) == 0) {
		if (strcmp($password, $repeatedPassword) != 0) {
			$error .= "<p>Las contraseñas no coinciden</p>";
		} else {
			try {
				if (validatePassword($password)) {
					$encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
					createUser($usuario, $encryptedPassword);
					$info = "<p>Usuario registrado</p>";
				} else {
					throw new UserPasswordException();
				}
			} catch (UserPasswordException $e) {
				echo $e->errorMessage();
			}
		}
	}
}

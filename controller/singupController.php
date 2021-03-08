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
	if (strlen($_POST["usuario"]) == 0) {
		$error .= "<p>No introdujo ningún usuario</p>";
	} else {
		$usuario = $_POST["usuario"];
	}
	if (strlen($_POST["password"] == 0)) {
		$error .= "<p>No introdujo ningúna contraseña</p>";
	} else {
		$password = $_POST["password"];
	}

	if (strlen($_POST["repeatedPassword"]) == 0) {
		$error .= "<p>No introdujo la contraseña por duplicado</p>";
	} else {
		$repeatedPassword = $_POST["repeatedPassword"];
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

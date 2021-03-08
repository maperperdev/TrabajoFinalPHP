<?php
/**
 * Controlador del acceso a la aplicación, se requiere de un usuario para poder operar.
 * Si el login falla, se ofrecerá registrarse.
 */
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
			$resgistrar = "<a href=\"view/singup.php\">Regístrese</a>";
		} else {
			if (password_verify($password, $retrievedPassword[0]["password"])) {
				session_start();
				$_SESSION["usuario"] = $usuario;
				header("Location: view/indexLogin.php");
			} else {
				$error .= "La contraseña es incorrecta";
			}
		}
	}
}

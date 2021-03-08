<?php
/**
 * Clase que implementa al excepción de error al validar la contraseña
 */
class UserPasswordException extends Exception
{
	public function errorMessage()
	{
		return "La contraseña no es válida. (Contraseña formadas por letras y números con una longitud de entre 5 y 10)";
	}
}

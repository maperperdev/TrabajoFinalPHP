<?php

function validatePassword($password) {
	if (strlen($password) < 5 || strlen($password) > 10) {
		return false;
	} 
	 return ctype_alnum($password);
}
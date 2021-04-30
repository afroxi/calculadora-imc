<?php 
	spl_autoload_register(function($class) {
		$carpeta = "$class";
		if (file_exists($carpeta)) {
			require_once("$carpeta/$class.php");
		} else {
			require_once("Usuario/$class.php");
		}
	});
?>
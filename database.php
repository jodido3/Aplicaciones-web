<?php
	// Credenciais base de datos
		$servername = "localhost";
		$username= "alan";
		$password = "turing";
		$database = "ENIGMA";

	// Crear conexión MySQL
		$conn = mysqli_connect($servername, $username, $password, $database);

	// Comprobar conexión, se falla mostrar erro
		if (!$conn) {
		die('<p> Fallou a conexión coa base de datos: </p>' . mysqli_connect_error());
}
		echo '<p>Conexión OK!</p>';
?>

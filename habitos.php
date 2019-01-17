<html>
<head>
	<title>Hábitos</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<?php
		include './database.php';
	// Crear novo habito (resposta ao POST)
		if (isset($_POST["nome"])) {
			$insert = "INSERT INTO Habitos (Nome) VALUES ('" . $_POST["nome"] . "');";
			$result = mysqli_query($conn, $insert);
			echo $result;
			echo "<p>Hábito " . $_POST["nome"] . ", creado</p>";
		}
	//Borrar hábito (resposta o get con parámetros)
		if (isset($_REQUEST["borrar"])) {
			$delete = "DELETE FROM Habitos WHERE ID=" . $_REQUEST["borrar"] . ";";
			$result = mysqli_query($conn, $delete);
			echo $result;
		}
	?>
	<h1>Hábitos</h1>
	<?php
		$lectura = "SELECT * FROM Habitos;";
		$habitos = mysqli_query($conn, $lectura);
		echo "Numero de habitos: " . mysqli_num_rows($habitos) . "<br>";
		while($hab = mysqli_fetch_array($habitos)){
		echo $hab['ID'] . " - " . $hab['Nome'] . "<a href=\"habitos.php?borrar=" . $hab['ID'] . "\"><i class=\"far fa-trash-alt\"></i></a><br>";
		}
	
	?>
	<p>Se precisas axuda, le <a href="https://www.youtube.com/">isto</a>.</p>
	<form name="habito" method="post" action="habitos.php">
		<input type="text" id="nome" name="nome">
		<button id="gardar" type="submit">Gardar</button>
	</form>
</body>
</html>

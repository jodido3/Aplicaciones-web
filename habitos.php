<html>
<head>
	<title>Hábitos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<style>
body{
	 background-image: url("azulito.jpg");
}
</style>
	<?php
		include './database.php';
		// Crear novo hábito (resposta ao POST)
		if(isset($_POST["nome"])){
			$insert = "INSERT INTO Habitos (Nome) VALUES ('" . $_POST["nome"] . "');";
			$result = mysqli_query($conn, $insert);
			echo $result;
			echo "<p>Hábito " . $_POST["nome"] . " creado</p>";
		}
		// Borrar hábito (resposta ao GET con parámetros)
		if (isset($_REQUEST["borrar"])) {
			$delete = "DELETE FROM Habitos WHERE ID=" . $_REQUEST["borrar"] . ";";
			$result = mysqli_query($conn, $delete);
			echo $result;
			echo "Hábito borrado";
		}
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Habit Tracker</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
		   <li class="nav-item">
		    <a class="nav-link" href="index.php">Login</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="home.php">Home</a>
		  </li>
		  <li class="nav-item active">
		    <a class="nav-link" href="habitos.php">Hábitos</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="rexistro.php">Rexistro</a>
		  </li>
		</ul>
	  </div>
	</nav>
	<h1>Hábitos</h1>
	<?php
		$lectura = "SELECT * FROM Habitos;";
		$habitos = mysqli_query($conn, $lectura);
		
		if (mysqli_num_rows($habitos) > 0) {
			echo "<ul class=\"list-group\">";
			while($hab = mysqli_fetch_array($habitos)){
				echo "<li class=\"list-group-item\">" . $hab['Nome'] . " <a href=\"habitos.php?borrar=" . $hab['ID'] . "\"><i class=\"far fa-trash-alt\"></i></a></li>";
			}
			echo "</ul>";
		} else {
			echo "Aínda non se creou ningún hábito";
		}
	?>
	<p>Se precisas axuda, le <a href="https://habitualmente.com/pasos-para-cambiar-de-habitos/">isto</a>.</p>
	<form name="habito" method="post" action="habitos.php">
		<input type="text" id="nome" name="nome">
		<button id="gardar" type="submit" class="btn btn-primary">Gardar</button>
	</form>	

<div style="text-align:center;padding:1em 0;"> <h3><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/city/3117735"><span style="color:gray;">Hora actual en</span><br />España</a></h3> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=medium&timezone=Europe%2FMadrid" width="100%" height="115" frameborder="0" seamless></iframe> </div>
</body>
</html>

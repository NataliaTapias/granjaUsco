<?php
session_start();

	if (!isset($_SESSION["profesor"]) || !isset($_SESSION["estudiante"]) || !isset($_SESSION["admin"])) {

		if (isset($_GET["estado"])) {
			if ($_GET["estado"] == "error") {
				echo '<script type="text/javascript">
					alert("Usuario o contraseña incorrecto, intentelo de nuevo.");
				</script>';
			}
		}

?>
		<!doctype html>
		<html lang="es">
		<head>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- Bootstrap CSS -->
			<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

			<title>Iniciar sesión</title>
		</head>
		<body>
			<main class="form-signin">
			<form action="../c/LoginValidacion.php" method="post">
				<img class="mb-5" src="../../assets/img/usco.png" alt="" width="100%">
				<h3 class="mb-3">Iniciar sesión</h3>

				<div class="form-floating mb-2">
				<input type="email" class="form-control" id="floatingInput" placeholder="nombre@ejemplo.com" name="usuario" required>
				<label for="floatingInput">Usuario</label>
				</div>
				<div class="form-floating">
				<input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="contra" required>
				<label for="floatingPassword" >Contraseña</label>
				</div>

				<div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me"> Recuerdame
				</label>
				</div>
				<button class="w-100 btn btn-lg btn-primary" name="btnInicio" id="btnInicio" type="submit">Ingresar</button>
				<p class="mt-5 mb-3 text-muted">&copy; Natalia Tapias Heredia</p>
			</form>
			</main>
			
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		</body>
		</html>
<?php
	}
	if (isset($_SESSION["profesor"])) {
		header("Location: panelProfe.php");
	}elseif (isset($_SESSION["estudiante"])) {
		header("Location: panelEstudiante.php");
	}elseif(isset($_SESSION["admin"])){
		header("Location: panelAdmin.php");
	}
?>
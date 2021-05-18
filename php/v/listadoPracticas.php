<?php
	session_start();
	if (isset($_SESSION["estudiante"])) {
		if(isset($_GET["practica"])){
			if ($_GET["practica"] == "registrado") {
				echo '<script type="text/javascript">
					alert("Te registraste exitosamente a la practica");
				</script>';
			}elseif($_GET["practica"] == "registradoAntes"){
				echo '<script type="text/javascript">
					alert("Ya estabas registrado");
				</script>';
			}
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<link rel="stylesheet" href="../../css/estilopaneles.css">
		<title></title>
	</head>
	<body>
		<header id="barra">
		  <div class="container">
		  	<p align="center"><img src="../../assets/img/universidad-surcolombiana-50.png" ></p>

		      <ul>
		      	<li><a href="../m/sesionDestroy.php" >cerrar sesion</a></li>	
		        <li><a href="misPracticas.php">Mis Practicas</a></li>
				<li><a href="listadoPracticas.php" class="active">Listado</a></li>
		        <li><a href="panelEstudiante.php" >Incio</a></li>
		      </ul>
		   
		  </div>
		</header>
		<div class="container">
            <div class="row">
            	<div class="col-3"></div>
            	<div class="col-6">
            		<h1 class="mt-5" align="center">Practicas Creadas</h1>
           			<p class="mb-5">Aqui podras ver el listado de las practicas que han creado, y te podras registrar.</p>
            	</div>
                
                <?php require_once ("../c/mostrarAllCursos.php"); ?>
            </div>
		</div>
		<br>
		</div>
	<footer class="footer mt-5 py-2" id="pie">
	  <div class="container ">
	    <p align="center">&copy Natalia Tapias Heredia</p>
	  </div>
	</footer>
	</body>

</html>

<?php
}else{
	header("Location: login.php");
}
?>
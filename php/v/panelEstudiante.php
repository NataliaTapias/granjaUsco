<?php
	session_start();
	if (isset($_SESSION["estudiante"])) {
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
				<li><a href="listadoPracticas.php">Listado</a></li>
		        <li><a href="panelEstudiante.php" class="active">Incio</a></li>
		      </ul>
		   
		  </div>
		</header>

		<div class="container-fluid mt-5" id="texto">
			
			<h1 align="center">BIENVENIDO</h1>
			<br>
			<p>En esta pagina podras agendar las practicas que se dicten en la granja experimental usquito, tu profesor creara la clase y tu podras agendar las practicas que desees, tambien podras ver el historial de tus practicas realizadas y los profesores que la orientaron. </p>
			<br><br>	
		<div class="row mb-2">
				<div class="col-md-6">
		          <div class="card flex-md-row mb-4 box-shadow h-md-250">
		            <div class="card-body d-flex flex-column align-items-start">
		            <h4 class="card-title mb-4" href="#" align="center">Agenda tus proximas practicas</h4>
		              
		              <p class="card-text mb-3">Aqui podras agendar tu proxima practica y el sistema te creara un registro de la misma.</p>
		              <a href="listadoPracticas.php" class="btn btn-primary btn-block" id="btnCP" align="center">Ver practicas</a>
		            </div>
		            <img class="card-img-right flex-auto d-none d-md-block" alt="Thumbnail [200x250]" src="../../assets/img/estudianteimg.jpeg" data-holder-rendered="true" style="width: 50%">
		          </div>
		        </div>
		        <div class="col-md-6">
		          <div class="card flex-md-row mb-4 box-shadow h-md-250">
		            <div class="card-body d-flex flex-column align-items-start">
		            <h4 class="card-title mb-4" href="#" align="center">Historial de practicas</h4>
		              
		              <p class="card-text mb-3">aqui podras ver el historial de tus practicas y saber a cuales has asistido.</p><br>
		              <a href="misPracticas.php" class="btn btn-primary btn-block" id="btnCP" align="center">Ver historial</a>
		            </div>
		            <img class="card-img-right flex-auto d-none d-md-block" alt="Thumbnail [200x250]" src="../../assets/img/listaimg.jpeg" data-holder-rendered="true" style="width: 50%">
		          </div>
		        </div>
      	</div>

		<br>
		</div>
	<footer class="footer mt-auto py-2" id="pie">
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
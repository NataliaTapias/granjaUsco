<?php
	session_start();
	if (isset($_SESSION["admin"])) {
		
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
				<li><a href="verHorarios.php">Ver Horarios</a></li>	
                <li><a href="crearHorarios.php">Crear Horarios</a></li>
                <li><a href="verPracticas.php" class="active">Ver Practicas</a></li>
                <li><a href="panelAdmin.php" >Incio</a></li>
		      </ul>
		   
		  </div>
		</header>
		<div class="container">
            <div class="row">
            	<div class="col-3"></div>
            	<div class="col-6">
            		<h1 class="mt-5" align="center">Practicas Creadas</h1>
           			<p class="mb-5">Aqui podras ver el listado de las practicas que han creado los profesores.</p>
            	</div>
                
                <form action="verPracticas.php" novalidate="" method="post">
                    <div class="row g-3">
                        
                        <div class="col-12">
                            <label for="lastName" class="form-label">Fecha de la practica</label>
                            <input type="date" name="fechaPractica">
                        </div>
                    </div>
                    <button class="w-100 btn btn-primary btn-lg mt-5 mb-5" name="btnVerPracticas" id="btnCP" type="submit">Ver practicas</button>
                </form>
                <?php require_once ("../c/verPracticasAdmin.php"); ?>
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
<?php
	session_start();
	if (isset($_SESSION["profesor"])) {
		if(isset($_GET["curso"])){
			if ($_GET["curso"] == "error") {
				echo '<script type="text/javascript">
					alert("Ya existe un curso en este horario.");
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
		        <li><a href="misCursos.php" >Mis Practicas</a></li>
				<li><a href="crearCurso.php" class="active">Crear Practicas</a></li>
		        <li><a href="panelProfe.php" >Incio</a></li>
		      </ul>
		   
		  </div>
		</header>
		<div class="container">
	        <div class="row">
	            <div class="col-sm-3"></div>
	            <div class="col-sm-6">
	                <h1 class="mb-5 mt-5 text-center">Crea una practica</h1>
	                <form action="../c/CrearCurso.php" novalidate="" method="post">
	                    <div class="row g-3">
	                        <div class="col-sm-6">
	                            <label for="firstName" class="form-label">Nombre de la practica: </label>
	                            <input type="text" class="form-control" id="firstName" name="Nombre" placeholder="Nombre" value="<?php if(isset($_GET["nombre"])){echo $_GET["nombre"];} ?>" required>
	                           
	                        </div>

	                        <div class="col-sm-6">
	                            <label for="lastName" class="form-label">Cantidad de estudiantes:</label>
	                            <input type="text" class="form-control" id="lastName" name="Cantidad" placeholder="Cantidad" value="<?php if(isset($_GET["cantidad"])){echo $_GET["cantidad"];} ?>" required>
	                            
	                        </div>

	                        <div class="col-12">
	                            <label for="lastName" class="form-label">Descripción de la practica</label>
	                            <textarea name="Descripcion" class="form-control" id="lastName" placeholder="Descripcion" value="" required><?php if(isset($_GET["descripcion"])){echo $_GET["descripcion"];} ?></textarea>
	                            
	                        </div>
							<div class="col-6">
	                            <label for="lastName" class="form-label">Fecha de la practica</label>
	                            <input type="date" name="fechaPractica" required>
	                        </div>
                            <div class="col-6">
	                            <label for="lastName" class="form-label">Hora de la practica</label>
	                            <select class="form-select" name="horaPractica" aria-label="Default select example">
                                    <option value="06:00:00" selected>6:00 am</option>
                                    <option value="08:00:00">8:00 am</option>
                                    <option value="10:00:00">10:00 am</option>
                                    <option value="12:00:00">12:00 am</option>
                                    <option value="14:00:00">2:00 pm</option>
                                    <option value="16:00:00">4:00 pm</option>
                                </select>
	                        </div>
	                    </div>
	                    <button class="w-100 btn btn-primary btn-lg mt-5 mb-5" name="btnCrearCurso" id="btnCP" type="submit">Crear practica</button>
	                </form>
	            </div>
	            <div class="col-sm-3"></div>
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
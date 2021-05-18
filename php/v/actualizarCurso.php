<?php
	session_start();
	if (isset($_SESSION["profesor"])) {
        require_once ('../m/conexion.php');
        if (isset($_GET["id"])) {
            $con = new Conexion();
	        $con->getCon();
            $consulta = $con->prepare('SELECT `nombre`, `cantidad`, `descripcion` FROM `curso` WHERE `idcursos`=:idcurso');
            $consulta->bindParam(':idcurso', $_GET["id"], PDO::PARAM_INT);
            $consulta->execute();
            $registro = $consulta->fetch();
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
		        <li><a href="misCursos.php">Mis cursos</a></li>
				<li><a href="crearCurso.php">Crear curso</a></li>
		        <li><a href="#" class="active">Incio</a></li>
		      </ul>
		   
		  </div>
		</header>
		<div class="container">
	        <div class="row">
	            <div class="col-sm-3"></div>
	            <div class="col-sm-6">
	                <h1 class="mb-5 mt-5 text-center">Actualizar practica</h1>
	                <form action="../c/actualizarCurso.php?id=<?php echo $_GET["id"]; ?>" novalidate="" method="post">
	                    <div class="row g-3">
	                        <div class="col-sm-6">
	                            <label for="firstName" class="form-label">Nombre de la practica: </label>
	                            <input type="text" class="form-control" id="firstName" name="Nombre" placeholder="Nombre" value="<?php echo $registro[0]; ?>" required="">
	                            <div class="invalid-feedback">
	                                Valid first name is required.
	                            </div>
	                        </div>

	                        <div class="col-sm-6">
	                            <label for="lastName" class="form-label">Cantidad de estudiantes:</label>
	                            <input type="text" class="form-control" id="lastName" name="Cantidad" placeholder="Cantidad" value="<?php echo $registro[1]; ?>" required="">
	                            <div class="invalid-feedback">
	                                Valid last name is required.
	                            </div>
	                        </div>

	                        <div class="col-12">
	                            <label for="lastName" class="form-label">Descripción de la practica</label>
	                            <textarea name="Descripcion" class="form-control" id="lastName" placeholder="Descripcion"required=""><?php echo $registro[2]; ?></textarea>
	                            <div class="invalid-feedback">
	                                Valid last name is required.
	                            </div>
	                        </div>
	                    </div>
	                    <button class="w-100 btn btn-primary btn-lg mt-5 mb-5" name="btnCrearCurso" id="btnCP" type="submit">Actualizar practica</button>
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
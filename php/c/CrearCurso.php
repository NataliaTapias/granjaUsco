<?php
session_start();
if (isset($_POST["btnCrearCurso"]) && isset($_SESSION["profesor"])) {

    require_once ('../m/conexion.php');

	$nombre = $_POST["Nombre"];
	$cantidad = $_POST["Cantidad"];
	$descripcion = $_POST["Descripcion"];
	$dia = $_POST["fechaPractica"];
	$hora = $_POST["horaPractica"];

    $fecha= $dia." ".$hora;

	$con = new Conexion();
	$con->getCon();
	
	$consulta = $con->prepare('SELECT `iddisponibilidad`,`fechaCompleta` FROM `disponibilidad` WHERE `fechaCompleta`= :fecha');
	$consulta->bindParam(':fecha', $fecha, PDO::PARAM_STR);
	$consulta->execute();
	$registro = $consulta->fetch();

	if($registro[1]!= null){

		try {
			$consulta = $con->prepare('INSERT INTO `curso`(`nombre`, `cantidad`, `descripcion`, `disponibilidad_iddisponibilidad`) VALUES (:nombre,:cantidad,:descripcion,:id)');
			$consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR, 45);
			$consulta->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
			$consulta->bindParam(':descripcion', $descripcion, PDO::PARAM_STR, 45);
			$consulta->bindParam(':id', $registro[0], PDO::PARAM_INT);
			$consulta->execute();

			$usuario=$_SESSION["profesor"];
			$consulta = $con->prepare('SELECT `idusuario` FROM `usuario` WHERE email= :usuario');
			$consulta->bindParam(':usuario', $usuario, PDO::PARAM_STR, 255);
			$consulta->execute();
			$registro = $consulta->fetch();


			$iduusuario=$registro[0];


			$consulta = $con->prepare('SELECT `idcursos` FROM `curso` WHERE `nombre`=:nombre AND `cantidad`=:cantidad AND `descripcion`=:descripcion');
			$consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR, 45);
			$consulta->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
			$consulta->bindParam(':descripcion', $descripcion, PDO::PARAM_STR, 45);
			$consulta->execute();
			$registro = $consulta->fetch();


			$consulta = $con->prepare('INSERT INTO `curso_has_usuario` (`curso_idcursos`, `usuario_idusuario`) VALUES (:idcurso,:idusuario);');
			$consulta->bindParam(':idcurso', $registro[0], PDO::PARAM_INT);
			$consulta->bindParam(':idusuario', $iduusuario, PDO::PARAM_INT);
			$consulta->execute();
			
			header("Location: ../v/misCursos.php?practica=creada");
		} catch (PDOException $Exception) {
			header("Location: ../v/crearCurso.php?curso=error&nombre=$nombre&cantidad=$cantidad&descripcion=$descripcion");
		}

		
	}else{
		header("Location: ../v/crearCurso.php?curso=error&nombre=$nombre&cantidad=$cantidad&descripcion=$descripcion");
	}


	

}else{
    header("Location: ../v/login.php");
}

	
?>
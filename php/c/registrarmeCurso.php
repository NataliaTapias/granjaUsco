<?php
session_start();
if (isset($_SESSION["estudiante"])) {
    require_once ('../m/conexion.php');

	$con = new Conexion();
	$con->getCon();
	try {
		$usuario=$_SESSION["estudiante"];
		$consulta = $con->prepare('SELECT `idusuario` FROM `usuario` WHERE email= :usuario');
		$consulta->bindParam(':usuario', $usuario, PDO::PARAM_STR, 255);
		$consulta->execute();
		$registro = $consulta->fetch();

		$consulta = $con->prepare('INSERT INTO `curso_has_usuario` (`curso_idcursos`, `usuario_idusuario`) VALUES (:idcurso,:idusuario);');
		$consulta->bindParam(':idcurso', $_GET["id"], PDO::PARAM_INT);
		$consulta->bindParam(':idusuario', $registro[0], PDO::PARAM_INT);
		$consulta->execute();

		$consulta = $con->prepare('SELECT `cantidad` FROM `curso` WHERE idcursos= :idcurso');
		$consulta->bindParam(':idcurso', $_GET["id"], PDO::PARAM_INT);
		$consulta->execute();
		$registro = $consulta->fetch();

		$cantidad= intval($registro[0])-1;

		$consulta = $con->prepare('UPDATE `curso` SET `cantidad`=:cantidad WHERE `idcursos`=:id');
		$consulta->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
		$consulta->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
		$consulta->execute();
	
    	header("Location: ../v/listadoPracticas.php?practica=registrado");
	} catch (PDOException $e) {
		header("Location: ../v/listadoPracticas.php?practica=registradoAntes");
	}
    

}else{
    header("Location: ../v/login.php");
}

	
?>
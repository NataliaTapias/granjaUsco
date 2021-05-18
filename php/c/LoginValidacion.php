<?php
session_start();
require_once ('../m/conexion.php');
	
	$usuario = $_POST["usuario"];
	$contra = $_POST["contra"];

	$con = new Conexion();
	$con->getCon();
	$consulta = $con->prepare('SELECT `email`, `password`, `tipo` FROM `usuario` WHERE email= :usuario AND password = :contra');

	$consulta->bindParam(':usuario', $usuario, PDO::PARAM_STR, 255);
	$consulta->bindParam(':contra', $contra, PDO::PARAM_STR, 32);
	$consulta->execute();
	$registro = $consulta->fetch();

	if ($registro[0] == $usuario && $registro[1] == $contra && $registro[2] == 0) {

		$_SESSION["profesor"]=$usuario;
		header("Location: ../v/panelProfe.php");

	}elseif ($registro[0] == $usuario && $registro[1] == $contra && $registro[2] == 1) {

		$_SESSION["estudiante"]=$usuario;
		header("Location: ../v/panelEstudiante.php");

	}elseif($registro[0] == $usuario && $registro[1] == $contra && $registro[2] == 2){

		$_SESSION["admin"]=$usuario;
		header("Location: ../v/panelAdmin.php");

	}else{
		header("Location: ../v/login.php?estado=error");
	}
	
?>
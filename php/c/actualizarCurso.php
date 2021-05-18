<?php
session_start();
if (isset($_SESSION["profesor"])) {

    require_once ('../m/conexion.php');

	$nombre = $_POST["Nombre"];
	$cantidad = $_POST["Cantidad"];
	$descripcion = $_POST["Descripcion"];

	$con = new Conexion();
	$con->getCon();
	if (isset($_GET["id"])) {
        
        $consulta = $con->prepare('UPDATE `curso` SET `nombre`=:nombre,`cantidad`=:cantidad,`descripcion`=:descripcion WHERE `idcursos`=:id');
        $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $consulta->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $consulta->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
        $consulta->execute();
    }
	
    header("Location: ../v/misCursos.php?practica=actualizada");

}else{
    header("Location: ../v/login.php");
}

	
?>
<?php
session_start();
if (isset($_SESSION["admin"])) {

    require_once ('../m/conexion.php');

	$dia = $_POST["fechaPractica"];
	$hora = $_POST["horaPractica"];

    $fecha= $dia." ".$hora;
    
    try {
        $con = new Conexion();
        $con->getCon();
        
        $consulta = $con->prepare('INSERT INTO `disponibilidad` (`fechaCompleta`,`fecha`) VALUES (:fecha,:dia)');
        $consulta->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $consulta->bindParam(':dia', $dia, PDO::PARAM_STR);
        $consulta->execute();

        header("Location: ../v/panelAdmin.php?horario=creado");
    } catch (PDOException $Exception) {
        echo $Exception;
        header("Location: ../v/panelAdmin.php?horario=error");
    }

	

}else{
    header("Location: ../v/login.php");
}

	
?>
<?php
session_start();
if (isset($_SESSION["estudiante"])) {
	if (isset($_GET["id"])) {
        require_once ('../m/conexion.php');
        $con = new Conexion();
        $con->getCon();
        
        $consulta = $con->prepare('SELECT `idusuario` FROM `usuario` WHERE `email`=:emaill');
        $consulta->bindParam(':emaill', $_SESSION["estudiante"], PDO::PARAM_STR);
        $consulta->execute();
        $registro = $consulta->fetch();

        echo $_GET["id"]." - ".$registro[0];

        $consulta = $con->prepare('DELETE FROM `curso_has_usuario` WHERE `curso_idcursos`=:idcurso  AND `usuario_idusuario`=:idusuario');
        $consulta->bindParam(':idcurso', $_GET["id"], PDO::PARAM_INT);
        $consulta->bindParam(':idusuario', $registro[0], PDO::PARAM_INT);
        $consulta->execute();

        $consulta = $con->prepare('SELECT `cantidad` FROM `curso` WHERE idcursos= :idcurso');
		$consulta->bindParam(':idcurso', $_GET["id"], PDO::PARAM_INT);
		$consulta->execute();
		$registro = $consulta->fetch();

		$cantidad= intval($registro[0])+1;

		$consulta = $con->prepare('UPDATE `curso` SET `cantidad`=:cantidad WHERE `idcursos`=:id');
		$consulta->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
		$consulta->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
		$consulta->execute();

        header("Location: ../v/misPracticas.php?practica=borrada");
    }
}
?>
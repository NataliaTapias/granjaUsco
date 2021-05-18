<?php
session_start();
if (isset($_SESSION["admin"])) {
	if (isset($_GET["horario"]) && isset($_GET["id"])) {
        require_once ('../m/conexion.php');
        $con = new Conexion();
        $con->getCon();

        $consulta = $con->prepare('SELECT `idcursos` FROM `curso` WHERE `disponibilidad_iddisponibilidad`=:id');
        $consulta->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
        $consulta->execute();
        $registro = $consulta->fetch();

        $consulta = $con->prepare('DELETE FROM `curso_has_usuario` WHERE `curso_idcursos`=:id');
        $consulta->bindParam(':id', $registro[0], PDO::PARAM_INT);
        $consulta->execute();

        $consulta = $con->prepare('DELETE FROM `curso` WHERE `disponibilidad_iddisponibilidad`=:id');
        $consulta->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
        $consulta->execute();

        $consulta = $con->prepare('DELETE FROM `disponibilidad` WHERE `iddisponibilidad`=:id');
        $consulta->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
        $consulta->execute();


        header("Location: ../v/verHorarios.php?horario=borrado");
    }
}
?>
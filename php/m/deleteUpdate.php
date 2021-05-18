<?php
	if (isset($_GET["practica"])) {
        if($_GET["practica"]=="eliminada"){

            $consulta = $con->prepare('DELETE FROM `curso_has_usuario` WHERE `curso_idcursos`=:id ');
            $consulta->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
            $consulta->execute();

            $consulta = $con->prepare('DELETE FROM `curso` WHERE `idcursos`=:id ');
            $consulta->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
            $consulta->execute();
            header("Location: misCursos.php?practica=borrada");
        }
    }
?>
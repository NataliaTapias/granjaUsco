<?php
if (isset($_SESSION["profesor"]) || isset($_SESSION["estudiante"])) {
    require_once ('../m/conexion.php');
    if (isset($_SESSION["profesor"])) {
        $usuario=$_SESSION["profesor"];
    }elseif(isset($_SESSION["estudiante"])){
        $usuario=$_SESSION["estudiante"];
    }
	$con = new Conexion();
	$con->getCon();


	$consulta = $con->prepare('SELECT `idusuario` FROM `usuario` WHERE email= :usuario');
	$consulta->bindParam(':usuario', $usuario, PDO::PARAM_STR, 255);
	$consulta->execute();
	$registro = $consulta->fetch();


    $usuario=$registro[0];


    $consulta = $con->prepare('SELECT `curso_idcursos` FROM `curso_has_usuario` WHERE `usuario_idusuario`= :idusuario');
	$consulta->bindParam(':idusuario', $usuario, PDO::PARAM_INT);
	$consulta->execute();
	$registro = $consulta->fetchAll();

    

    foreach ($registro as $row => $id) {
        
        

        $consulta = $con->prepare('SELECT `idcursos`, `nombre`, `cantidad`, `descripcion`, `disponibilidad_iddisponibilidad` FROM `curso` WHERE `idcursos`=:idcurso');
        $consulta->bindParam(':idcurso', $id[0], PDO::PARAM_INT);
        $consulta->execute();
        $registro = array_reverse($consulta->fetch());

        $consulta = $con->prepare('SELECT `fechaCompleta`  FROM `disponibilidad` WHERE `iddisponibilidad`=:iddispo');
        $consulta->bindParam(':iddispo', $registro[0], PDO::PARAM_INT);
        $consulta->execute();
        $registro2 = $consulta->fetchAll();

        foreach ($registro2 as $key => $value) {
            if (isset($_SESSION["profesor"])) {
                echo '
                    <div class="card mt-2 cards">
                        <div class="card-body">
                            <h3 class="card-title mb-2">'.$registro[3].'</h3>
                            <hr id="linea1">
                            <h6 class="card-subtitle mb-3 text-muted">Hay '.$registro[2].' cupos libres para inscrición</h6>
                            <hr id="linea2">
                            <p class="card-text">'.$registro[1].'</p>
                            <hr id="linea2">
                            <p class="card-text">'.$value[0].'</p>
                            <a href="actualizarCurso.php?id='.$registro[4].'" class="btn" id="btns">Editar</a>
                            <a href="misCursos.php?practica=eliminada&id='.$registro[4].'" class="btn" id="btns">Eliminar</a>
                        </div>
                    </div>
                ';
            }elseif(isset($_SESSION["estudiante"])){
                echo '
                    <div class="card mt-2 cards">
                        <div class="card-body">
                            <h3 class="card-title mb-2">'.$registro[3].'</h3>
                            <hr id="linea1">
                            <h6 class="card-subtitle mb-3 text-muted">Hay '.$registro[2].' cupos libres para inscrición</h6>
                            <hr id="linea2">
                            <p class="card-text">'.$registro[1].'</p>
                            <hr id="linea2">
                            <p class="card-text">'.$value[0].'</p>
                            <a href="../c/borrarMiPractica.php?id='.$registro[4].'" class="btn" id="btns">Borrar</a>
                        </div>
                    </div>
                ';
            }
        }

        

        
        
    }

}
	
?>
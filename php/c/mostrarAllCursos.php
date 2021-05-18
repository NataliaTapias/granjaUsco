<?php
if (isset($_SESSION["estudiante"])) {
    require_once ('../m/conexion.php');

	$con = new Conexion();
	$con->getCon();


    $consulta = $con->prepare('SELECT * FROM `curso`');
	$consulta->execute();
    $registro = array_reverse($consulta->fetchAll());

    foreach ($registro as $row => $id) {

        $consulta = $con->prepare('SELECT `fechaCompleta`  FROM `disponibilidad` WHERE `iddisponibilidad`=:iddispo');
        $consulta->bindParam(':iddispo', $id[5], PDO::PARAM_INT);
        $consulta->execute();
        $registro2 = $consulta->fetchAll();

        foreach ($registro2 as $key => $value) {
             echo '
            <div class="col-sm-6">
                <div class="card mt-2 cards">
                    <div class="card-body">
                        <h3 class="card-title mb-2">'.$id[1].'</h3>
                        <hr id="linea1">
                        <h6 class="card-subtitle mb-3 text-muted">Hay '.$id[2].' cupos libres para inscrición</h6>
                        <hr id="linea2">
                        <p class="card-text">'.$id[3].'</p>
                        <hr id="linea2">
                        <p class="card-text">'.$value[0].'</p>
                        <a href="../c/registrarmeCurso.php?id='.$id[0].'" class="btn" id="btns">Regitrarme</a>
                    </div>
                </div>
            </div>
        ';
        }

       
    }

}
	
?>
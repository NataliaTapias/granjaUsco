<?php
if (isset($_SESSION["admin"]) && isset($_POST["btnVerPracticas"])) {
    require_once ('../m/conexion.php');
    
    $dia = $_POST["fechaPractica"];

	$con = new Conexion();
	$con->getCon();


    $consulta = $con->prepare('SELECT `iddisponibilidad`,`fechaCompleta`  FROM `disponibilidad` WHERE `fecha`=:fecha');
    $consulta->bindParam(':fecha', $dia, PDO::PARAM_STR);
	$consulta->execute();
    $registro = $consulta->fetchAll();

    

    if($registro != null){
        foreach ($registro as $key => $value) {

            $fechaCompleta=$value[1];
    
            $consulta = $con->prepare('SELECT `nombre`, `cantidad`, `descripcion` FROM `curso` WHERE `disponibilidad_iddisponibilidad`=:idDisponibilidad');
            $consulta->bindParam(':idDisponibilidad', $value[0], PDO::PARAM_INT);
            $consulta->execute();
            $registro = $consulta->fetchAll();
    
            
    
            foreach ($registro as $row => $id) {
                echo '
                    <div class="col-sm-6">
                        <div class="card mt-2 cards">
                            <div class="card-body">
                                <h3 class="card-title mb-2">'.$id[0].'</h3>
                                <hr id="linea1">
                                <h6 class="card-subtitle mb-3 text-muted">Hay '.$id[1].' cupos libres para inscrición</h6>
                                <hr id="linea2">
                                <p class="card-text">'.$id[2].'</p>
                                <hr id="linea2">
                                <p class="card-text">'.$fechaCompleta.'</p>
                            </div>
                        </div>
                    </div>
                ';
            }
    
        }


    }
       

}
	
?>
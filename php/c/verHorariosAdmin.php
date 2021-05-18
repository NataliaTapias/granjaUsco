<?php
if (isset($_SESSION["admin"]) && isset($_POST["btnVerHorarios"])) {
    require_once ('../m/conexion.php');
    
    $dia = $_POST["fechaHorario"];

	$con = new Conexion();
	$con->getCon();


    $consulta = $con->prepare('SELECT * FROM `disponibilidad` WHERE `fecha`=:fecha');
    $consulta->bindParam(':fecha', $dia, PDO::PARAM_STR);
	$consulta->execute();
    $registro = $consulta->fetchAll();

    

    if($registro != null){
        foreach ($registro as $row => $id) {
            echo '
                <div class="col-sm-6">
                    <div class="card mt-2 cards">
                        <div class="card-body">
                            <h3 class="card-title mb-2">'.$id[1].'</h3>
                            <hr id="linea1">
                            <a href="../c/eliminareditar.php?horario=eliminado&id='.$id[0].'" class="btn" id="btns">Eliminar</a>
                        </div>
                    </div>
                </div>
            ';
        }
    }

       

}
	
?>
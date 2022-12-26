<?php 
    require_once "../../config/database.php";

    if($_GET['act']=='imprimir'){
        if(isset($_GET['rec_cod'])){//si existe en la bd el rec_cod
            $rec_cod = $_GET['rec_cod'];
            
            $query = mysqli_query($mysqli, "SELECT * FROM v_recepciones WHERE rec_cod = $rec_cod")
                                            or die('Error: '.mysqli_error($mysqli));

            while($data = mysqli_fetch_assoc($query)){
                $rec_cod = $data ['rec_cod'];
                $rec_fecha = $data ['rec_fecha'];
                $rec_estado = $data ['rec_estado'];
                $emp_cod = $data ['emp_cod'];
                $emp_nom_ape = $data ['emp_nom_ape'];
                $suc_cod = $data ['suc_cod'];
                $suc_descri_direc = $data ['suc_descri_direc'];
                $cli_cod = $data ['cli_cod'];
                $cli_nom_ape_ci = $data ['cli_nom_ape_ci'];
                $veh_cod = $data ['veh_cod'];
                $veh_chapa_marca = $data ['veh_chapa_marca'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Vehiculo</title> 
    </head>

    <body>
        <div align='center'>
            <p align="center">
                ===============================
                RECEPCION DE VEHICULO
                ===============================
                <br><br>
                <label>
                    <strong>Fecha: </strong><?php echo $rec_fecha ?>
                </label><br>
                <label>
                    <strong>Estado: </strong><?php echo $rec_estado ?>
                </label><br>
                <label>
                    <strong>Nro Recepcion: </strong><?php echo'000';echo $rec_cod ?>
                </label><br>
                <label>
                    <strong>Sucursal: </strong><?php echo $suc_descri_direc ?>
                </label>
                <br><br>
                ===============================
                <br><br>
                <label>
                    <strong>Cliente: </strong><?php echo $cli_nom_ape_ci ?><br>
                    <strong>Vehiculo: </strong><?php echo $veh_chapa_marca ?>
                </label>
                <br><br>
                ===============================
                Taller
            </p>
        </div>
    </body>
</html>
<?php 
    require_once "../../config/database.php";

    if($_GET['act']=='imprimir'){
        if(isset($_GET['sal_cod'])){//si existe en la bd el rec_cod
            $sal_cod = $_GET['sal_cod'];
            
            $query = mysqli_query($mysqli, "SELECT * FROM v_salidas WHERE sal_cod = $sal_cod")
                                            or die('Error: '.mysqli_error($mysqli));

            while($data = mysqli_fetch_assoc($query)){
                $sal_cod = $data ['sal_cod'];
                $sal_fecha = $data ['sal_fecha'];
                $sal_estado = $data ['sal_estado'];
                $emp_cod = $data ['emp_cod'];
                $emp_nom_ape = $data ['emp_nom_ape'];
                $suc_cod = $data ['suc_cod'];
                $suc_descri_direc = $data ['suc_descri_direc'];
                $cli_cod = $data ['cli_cod'];
                $cli_nom_ape = $data ['cli_nom_ape'];
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
                SALIDA DE VEHICULO
                ===============================
                <br><br>
                <label>
                    <strong>Nro Recepcion: </strong><?php echo'000';echo $sal_cod ?>
                </label><br>
                <label>
                    <strong>Fecha: </strong><?php echo $sal_fecha ?>
                </label><br>
                <label>
                    <strong>Estado: </strong><?php echo $sal_estado ?>
                </label><br>
                <label>
                    <strong>Sucursal: </strong><?php echo $suc_descri_direc ?>
                </label>
                <br><br>
                ===============================
                <br><br>
                <label>
                    <strong>Cliente: </strong><?php echo $cli_nom_ape ?><br>
                    ----------------------------------------------------
                    <br>
                    <strong>Vehiculo: </strong><?php echo $veh_chapa_marca ?>
                </label>
                <br><br>
                ===============================
                TALLER
            </p>
        </div>
    </body>
</html>
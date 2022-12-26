<?php 

    require_once "../../config/database.php";

    //--------------------------------------------------------------------

    if(isset($_GET['dia_cod'])){//si existe en la bd el cod_entrada
        $dia_cod = $_GET['dia_cod'];
        //----------------------------------
        $query = mysqli_query($mysqli, "SELECT * FROM v_diagnosticos  WHERE dia_cod = $dia_cod") 
                        or die('Error: '.mysqli_error($mysqli));
        
        while($data = mysqli_fetch_assoc($query)){
            $dia_cod = $data ['dia_cod'];
            $dia_fecha = $data ['dia_fecha'];
            $dia_estado = $data ['dia_estado'];
            $suc_cod = $data ['suc_cod'];
            $suc_descri_direc = $data ['suc_descri_direc'];
            $emp_nom_ape = $data ['emp_nom_ape'];
            $veh_cod = $data ['veh_cod'];
            $ddi_descri = $data ['ddi_descri'];
            $cli_nom_ape = $data ['cli_nom_ape'];
            $cli_ci = $data ['cli_ci'];
            $veh_chapa_marca = $data ['veh_chapa_marca'];
        }       
     
    //--------------------------------------------------------------------
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Diagnóstico</title>
        <link rel="stylesheet" type="text/css" href="../../assets/img/favicon.ico">
    </head>
    <body>
        
        <div align="center">
            <h3>Diagnóstico</h3>
        </div>
        <div>
            <strong>Diagnosticado por:</strong>
             <?php echo "$emp_nom_ape" ?>
        </div>
        ==============================================
        <br>

        <div align='left'>
            <label>
                <strong>Fecha diagnostico: </strong><?php echo $dia_fecha ?>
            </label><br>
            
            <label>
                <strong>Vehículo: </strong><?php echo $veh_chapa_marca ?>
            </label><br>
        </div>
        ==============================================
        <br>
        <!-------------------------------->
        <div align='left'>
            <label>
                <strong>Diagnostico: </strong><?php echo $ddi_descri ?>
            </label><br>
        </div>
        ==============================================
        <!-------------------------------->
        Impreso desde el Area Virtual del Taller
    </body>
</html>
<?php 
    }
?>
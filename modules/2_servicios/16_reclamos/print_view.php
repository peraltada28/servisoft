<?php 

    require_once "../../config/database.php";

    //--------------------------------------------------------------------

    if(isset($_GET['rec_cod'])){//si existe en la bd el cod_entrada
        $rec_cod = $_GET['rec_cod'];
        //----------------------------------
        $query = mysqli_query($mysqli, "SELECT * FROM v_reclamos  WHERE rec_cod = $rec_cod") 
                        or die('Error: '.mysqli_error($mysqli));
        
        while($data = mysqli_fetch_assoc($query)){
            $rec_cod = $data ['rec_cod'];
            $rec_asunto = $data ['rec_asunto'];
            $rec_descri = $data ['rec_descri'];
            $rec_fecha = $data ['rec_fecha'];
            $rec_estado = $data ['rec_estado'];
            $cli_nom_ape = $data ['cli_nom_ape'];
            $cli_ci = $data ['cli_ci'];
            $suc_cod = $data ['suc_cod'];
            $suc_descri_direc = $data ['suc_descri_direc'];
            $emp_nom_ape = $data ['emp_nom_ape'];
        }       
     
    //--------------------------------------------------------------------
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reclamo</title>
        <link rel="stylesheet" type="text/css" href="../../assets/img/favicon.ico">
    </head>
    <body>
        
        <div align="center">
            <h3>Reclamo</h3>
        </div>
        <div>
            <strong>Recibido por:</strong>
             <?php echo "$emp_nom_ape" ?>
        </div>
        ==============================================
        <br>

        <div align='left'>
            <label>
                <strong>Fecha Reclamo: </strong><?php echo $rec_fecha ?>
            </label><br>
            
        </div>
        ==============================================
        <br>
        <!-------------------------------->
        <div align='left'>
            <label>
                <strong>Asunto: </strong><br><?php echo $rec_asunto; ?>
            </label><br>
            --------------------------------------------------------------------------------
            <label>
                <strong>Reclamo: </strong><br><?php echo $rec_descri; ?>
            </label><br>
        </div>
        ==============================================
        <!-------------------------------->

        <label align='center'>
            Impreso desde el Area Virtual del Taller
        </label>
    </body>
</html>
<?php 
    }
?>
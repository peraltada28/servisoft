<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['usu_nombre']) && empty($_SESSION['usu_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){
        //cambiar act en form_ac
        if(isset($_POST['Guardar'])){

            //Definir variables
            $rec_cod = $_POST['rec_cod'];
            $rec_fecha = $_POST['rec_fecha'];
            $emp_cod = $_POST['emp_cod'];
            $rec_descri = strtoupper($_POST['rec_descri']);
            $rec_estado='ACTIVO';
            $sal_cod = $_POST['sal_cod'];
            $rec_asunto = strtoupper($_POST['rec_asunto']);;
            $suc_cod = $_SESSION['suc_cod'];
            $cli_cod = $_POST['cli_cod'];
            $sal_cod = $_POST['sal_cod'];

            strtoupper($_POST['rec_descri']);
          
            //insertar
            //------------------------------------------------------------------------------------------------------------------------------
            $query = mysqli_query($mysqli, "INSERT INTO reclamos (rec_cod, rec_asunto, rec_descri, rec_fecha, rec_estado, emp_cod, suc_cod, sal_cod, cli_cod)
                                            VALUES ($rec_cod, '$rec_asunto', '$rec_descri', '$rec_fecha', '$rec_estado', $emp_cod, $suc_cod, $sal_cod, $cli_cod)")    
            or die('Error 29: '.mysqli_error($mysqli));

            //update
            //------------------------------------------------------------------------------------------------------------------------------
            $query_up = mysqli_query($mysqli, "UPDATE salida SET sal_estado = 'RECLAMO' WHERE sal_cod = $sal_cod;")    
            or die('Error 35: '.mysqli_error($mysqli));

            
            if($query){
                header("Location: ../../main.php?module=reclamos&alert=1");
            } else {
                header("Location: ../../main.php?module=reclamos&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['dia_cod'])){
            $dia_cod = $_GET['dia_cod'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE diagnostico SET dia_estado='ANULADO' WHERE dia_cod=$dia_cod")
            or die('Error'.mysqli_error($mysqli));


            $sql_sse = mysqli_query($mysqli, "SELECT sse_cod FROM diagnostico WHERE dia_cod=$dia_cod");
            $rw_sse = mysqli_fetch_array($sql_sse);
            $sse_cod = $rw_sse['sse_cod'];

            $update_1 = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado = 'INGRESADO' WHERE veh_cod=$veh_cod");

            if($query && $update_1){
                header("Location: ../../main.php?module=diagnosticos&alert=3");
            } else {
                header("Location: ../../main.php?module=diagnosticos&alert=4");
            }
        }
    }
}
<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['fun_nom']) && empty($_SESSION['fun_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){
        //cambiar act en form_ac
        if(isset($_POST['Guardar'])){
            $dia_cod = $_POST['dia_cod'];
            $veh_cod = $_POST['veh_cod'];
            $dia_fec = $_POST['dia_fec'];
            $fun_cod = $_POST['fun_cod'];
            $dia_des = $_POST['dia_des'];

            while($row_ = mysqli_fetch_array($sql_)){
                $veh_cod= $row_['veh_cod'];

                //traer el id del cliente registrado con el vehiculo
                $cli = mysqli_query($mysqli, "SELECT cli_cod FROM vehiculos WHERE veh_cod='$veh_cod'");
                $rw_cli = mysqli_fetch_array($cli);
                $cli_cod = $rw_cli['cli_cod'];


                //insertar en el detalle
                $insert_detalle_ = mysqli_query($mysqli, 
                                "INSERT INTO detalle_diagnostico (dia_cod, veh_cod, ddi_descri, cli_cod) 
                                VALUES ($dia_cod, $veh_cod, '$ddi_descrip', $cli_cod)")
                                or die('Error 36'.mysqli_error($mysqli));
                
            }
            
            //Definir variables
            $dia_est='ACTIVO';
            $sse_cod = $_POST['sse_cod'];
            $suc_cod = $_SESSION['suc_cod'];

            //insertar
            //------------------------------------------------------------------------------------------------------------------------------
            $query = mysqli_query($mysqli, "INSERT INTO diagnostico (dia_cod, dia_fecha, dia_estado, suc_cod, emp_cod, sse_cod, usu_cod)
                                            VALUES ($dia_cod, '$dia_fecha', '$dia_estado', $suc_cod, $emp_cod, $sse_cod, $usu_cod)")    
            or die('Error 36: '.mysqli_error($mysqli));

            //------------------------------------------------------------------------------------------------------------------------------
            $update_sse = mysqli_query($mysqli, "UPDATE solicitud_servicio SET sse_estado = 'PROCESADO' WHERE sse_cod = $sse_cod")
                                    or die('Error 41: '.mysqli_error($mysqli));

            //------------------------------------------------------------------------------------------------------------------------------
            $update_veh = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado = 'DIAGNOSTICADO' WHERE veh_cod = $veh_cod")
            or die('Error 41: '.mysqli_error($mysqli));
            
            //------------------------------------------------------------------------------------------------------------------------------

            if($query){
                header("Location: ../../main.php?module=diagnosticos&alert=1");
            } else {
                header("Location: ../../main.php?module=diagnosticos&alert=3");
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

            $sql_veh = mysqli_query($mysqli, "SELECT veh_cod FROM solicitud_servicio WHERE sse_cod=$sse_cod");
            $rw_veh = mysqli_fetch_array($sql_veh);
            $veh_cod = $rw_veh['veh_cod'];

            $update_1 = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado = 'INGRESADO' WHERE veh_cod=$veh_cod");
            $update_2 = mysqli_query($mysqli, "UPDATE solicitud_servicio SET sse_estado = 'ACTIVO' WHERE sse_cod=$sse_cod");

            if($query && $update_1){
                header("Location: ../../main.php?module=diagnosticos&alert=3");
            } else {
                header("Location: ../../main.php?module=diagnosticos&alert=4");
            }
        }
    }
}
<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['usu_nombre']) && empty($_SESSION['usu_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){//cambiar act en form
        if(isset($_POST['Guardar'])){
            //Definir variables
            $rec_cod = $_POST['rec_cod'];
            $rec_fecha = $_POST['rec_fecha'];
            $rec_estado='INGRESASO';
            $emp_cod = $_POST['emp_cod'];
            $veh_cod = $_POST['veh_cod'];
            $suc_cod = $_SESSION['suc_cod'];
            $cli_cod = $_POST['cli_cod'];

            //------------------------------------------
            //insertar 
            $query_ = mysqli_query($mysqli, "INSERT INTO recepciones
                                            VALUES ($rec_cod, '$rec_fecha', '$rec_estado', $veh_cod, $emp_cod, $suc_cod, $cli_cod)")
                                            or die('Error 22: '.mysqli_error($mysqli));
            //actualizar el estado del vehiculo
            $sql_upd_ent = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado='INGRESADO' 
                                            WHERE veh_cod = $veh_cod")
                                            or die('Error'.mysqli_error($mysqli));

            
            if($query_){
                header("Location: ../../main.php?module=recepcion&alert=1");
            } else {
                header("Location: ../../main.php?module=recepcion&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['rec_cod'])){
            $rec_cod = $_GET['rec_cod'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE recepciones SET rec_estado='ANULADO' WHERE rec_cod=$rec_cod")
            or die('Error'.mysqli_error($mysqli));

            $query_u = mysqli_query($mysqli, "SELECT veh_cod FROM recepciones WHERE rec_cod = $rec_cod")
                                            or die('Error'.mysqli_error($mysqli));

            while ($data_dep = mysqli_fetch_assoc($query_u)){
                $veh_cod = $data_dep['veh_cod'];

                $query = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado='SOLICITUD' WHERE veh_cod=$veh_cod")
                or die('Error'.mysqli_error($mysqli));
            } 
            
            if($query){
                header("Location: ../../main.php?module=recepcion&alert=2");
            } else {
                header("Location: ../../main.php?module=recepcion&alert=3");
            }
        }
    } 
}
?>

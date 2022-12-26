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
            $sal_cod = $_POST['sal_cod'];
            $sal_fecha = $_POST['sal_fecha'];
            $sal_estado='GARANTIA OPERATIVO';
            $veh_cod = $_POST['veh_cod'];

            $sql = mysqli_query($mysqli, "SELECT cli_cod FROM vehiculos WHERE veh_cod = $veh_cod");
            $row = mysqli_fetch_assoc($sql);
            $cli_cod = $row['cli_cod'];

            $emp_cod = $_POST['emp_cod'];
            $suc_cod = $_SESSION['suc_cod'];

            //------------------------------------------
            //insertar 
            $query_ = mysqli_query($mysqli, "INSERT INTO salida
                                            VALUES ($sal_cod, '$sal_fecha', '$sal_estado', $veh_cod, $cli_cod, $emp_cod, $suc_cod)")
                                            or die('Error 22: '.mysqli_error($mysqli));
            //actualizar el estado del vehiculo
            $sql_upd_ent = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado='GARANTIA OPERATIVO' 
                                            WHERE veh_cod = $veh_cod")
                                            or die('Error'.mysqli_error($mysqli));

            
            if($query_){
                header("Location: ../../main.php?module=salida&alert=1");
            } else {
                header("Location: ../../main.php?module=salida&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['sal_cod'])){
            $sal_cod = $_GET['sal_cod'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE salida SET sal_estado='ANULADO' WHERE sal_cod=$sal_cod")
            or die('Error'.mysqli_error($mysqli));

            $query_u = mysqli_query($mysqli, "SELECT veh_cod FROM salida WHERE sal_cod = $sal_cod")
                                            or die('Error'.mysqli_error($mysqli));

            while ($data_dep = mysqli_fetch_assoc($query_u)){
                $veh_cod = $data_dep['veh_cod'];

                $query = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado='SERVICIO RELIZADO'
                                                WHERE veh_cod = $veh_cod")
                or die('Error'.mysqli_error($mysqli));
            } 
            
            if($query){
                header("Location: ../../main.php?module=salida&alert=2");
            } else {
                header("Location: ../../main.php?module=salida&alert=3");
            }
        }
    } 
}
?>

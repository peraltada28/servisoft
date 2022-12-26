<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['usu_nombre']) && empty($_SESSION['usu_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){//cambiar act en form
        if(isset($_POST['Guardar'])){

            
            $ser_cod = $_POST['ser_cod'];
            
            //Insertar detalle de servicio
            $sql=mysqli_query($mysqli, "SELECT * FROM items it, tmp_items tmp WHERE it.ite_cod=tmp.ite_cod");
            
            while($row = mysqli_fetch_array($sql)){
                $ite_cod= $row['ite_cod'];
                $precio= $row['precio_tmp'];
                $cantidad= $row['cantidad_tmp'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_servicios (ser_cod, ite_cod, dse_cant, dse_precio) 
                                                         VALUES ($ser_cod, $ite_cod, $cantidad, $precio)")
                                        or die('Error 22'.mysqli_error($mysqli));
                
            }
            

            //traer los datos
            $ser_fecha = $_POST['ser_fecha'];
            $ser_estado='ACTIVO';
            $suc_cod = $_SESSION['suc_cod'];
            $emp_cod = $_POST['emp_cod'];
            $otr_cod = $_POST['otr_cod'];

            $sql_cods=mysqli_query($mysqli, "SELECT * FROM orden_trabajo WHERE otr_cod=$otr_cod");
            
            $rows = mysqli_fetch_array($sql_cods);
            $cli_cod = $rows['cli_cod'];
            $veh_cod = $rows['veh_cod'];
            

            $ser_descrip = strtoupper($_POST['ser_descrip']);

            //insertar 
            $query = mysqli_query($mysqli, "INSERT INTO servicios (ser_cod, ser_descrip, ser_fecha, ser_estado, otr_cod, suc_cod, emp_cod, cli_cod, veh_cod)
                                            VALUES ($ser_cod, '$ser_descrip', '$ser_fecha', '$ser_estado', $otr_cod, $suc_cod, $emp_cod, $cli_cod, $veh_cod)")
                                            or die('Error'.mysqli_error($mysqli));
            
            //update estado de vehiculo
            $veh_estado='SERVICIO RELIZADO';
            $query_2 = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado = '$veh_estado'
                                            WHERE veh_cod = $veh_cod")
                                            or die('Error'.mysqli_error($mysqli));

            $query_1 = mysqli_query($mysqli, "UPDATE orden_trabajo SET otr_estado='EJECUTADO' WHERE otr_cod=$otr_cod");

            if($query){
                header("Location: ../../main.php?module=servicios&alert=1");
            } else {
                header("Location: ../../main.php?module=servicios&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['ser_cod'])){
            $ser_cod = $_GET['ser_cod'];
            //Anular cabecera de servicios (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE servicios SET ser_estado='ANULADO' WHERE ser_cod=$ser_cod")
            or die('Error'.mysqli_error($mysqli));

            
            $query_del = mysqli_query($mysqli, "DELETE FROM detalle_servicios WHERE ser_cod=$ser_cod");

            $sql_otr = mysqli_query($mysqli, "SELECT * FROM servicios WHERE ser_cod=$ser_cod");
            $rows = mysqli_fetch_array($sql_otr);
            $otr_cod = $rows['otr_cod'];
            $veh_cod = $rows['veh_cod'];

            $query_1 = mysqli_query($mysqli, "UPDATE orden_trabajo SET otr_estado='ACTIVO' WHERE otr_cod=$otr_cod");
            $query_2 = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado='ORDENADO' WHERE veh_cod=$veh_cod");
            

            if($query){
                header("Location: ../../main.php?module=servicios&alert=2");
            } else {
                header("Location: ../../main.php?module=servicios&alert=3");
            }
        }
    } 
}
?>

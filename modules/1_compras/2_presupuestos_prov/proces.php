<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['usu_nombre']) && empty($_SESSION['usu_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){//cambiar act en form_ac
        if(isset($_POST['Guardar'])){
            $pre_cod = $_POST['pre_cod'];
            $pre_fecha = $_POST['pre_fecha'];
            $pre_estado='ACTIVO';
            $emp_cod = $_POST['emp_cod'];
            $suc_cod = $_SESSION['suc_cod'];
            $veh_cod = $_POST['veh_cod'];
            $dia_cod = $_POST['dia_cod'];
            
            $sql_cli = mysqli_query($mysqli, "SELECT cli_cod FROM v_vehiculos WHERE veh_cod=$veh_cod");
            $rw_cli = mysqli_fetch_array($sql_cli);
            $cli_cod= $rw_cli['cli_cod'];

            $sql_=mysqli_query($mysqli, "SELECT * FROM items it, tmp_items tmp WHERE it.ite_cod=tmp.ite_cod");

            while($row_ = mysqli_fetch_array($sql_)){
                $ite_cod= $row_['ite_cod'];
                $precio= $row_['precio_tmp'];
                $cantidad= $row_['cantidad_tmp'];
                $insert_detalle_ = mysqli_query($mysqli, 
                                "INSERT INTO detalle_presupuesto (pre_cod, ite_cod, dep_cant, dep_precio) 
                                VALUES ($pre_cod, $ite_cod, $cantidad, $precio)")
                                or die('Error 109'.mysqli_error($mysqli));
                
            }

            //actualizar el estado de la entrada
            /*$sql_upd_ent = mysqli_query($mysqli, "UPDATE entradas SET estado='en diagnostico' WHERE cod_entrada=$cod_entrada")
                                                  or die('Error'.mysqli_error($mysqli));*/
            //Insertar cabecera de entrada
            
            $query = mysqli_query($mysqli, "INSERT INTO presupuestos (pre_cod, pre_fecha, pre_estado, emp_cod, suc_cod, cli_cod, dia_cod,veh_cod)
                                            VALUES ($pre_cod, '$pre_fecha', '$pre_estado', $emp_cod, $suc_cod, $cli_cod, $dia_cod, $veh_cod)")    
            or die('Error 36: '.mysqli_error($mysqli));

            $update_dia = mysqli_query($mysqli, "UPDATE diagnostico SET dia_estado = 'PRESUPUESTADO' WHERE dia_cod = $dia_cod")
                                    or die('Error 41: '.mysqli_error($mysqli));
            $update_veh = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado = 'PRESUPUESTADO' WHERE veh_cod = $veh_cod")
            or die('Error 41: '.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=presupuestos&alert=1");
            } else {
                header("Location: ../../main.php?module=presupuestos&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['pre_cod'])){
            $pre_cod = $_GET['pre_cod'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE presupuestos SET pre_estado='ANULADO' WHERE pre_cod=$pre_cod")
            or die('Error'.mysqli_error($mysqli));
            
            //eliminar los detalles
            $query_del = mysqli_query($mysqli, "DELETE FROM detalle_presupuesto WHERE pre_cod=$pre_cod")
            or die('Error'.mysqli_error($mysqli));

            $query_del = mysqli_query($mysqli, "DELETE FROM asignacion_personal WHERE pre_cod=$pre_cod")
            or die('Error'.mysqli_error($mysqli));

            //capturar datos para setear de nuevo el estado del movimiento anterior
            $sql_sse = mysqli_query($mysqli, "SELECT dia_cod FROM presupuestos WHERE pre_cod=$pre_cod");
            $rw_sse = mysqli_fetch_array($sql_sse);
            $dia_cod = $rw_sse['dia_cod'];

            $update = mysqli_query($mysqli, "UPDATE diagnostico SET dia_estado = 'ACTIVO' WHERE dia_cod=$dia_cod");

            $sql_veh = mysqli_query($mysqli, "SELECT veh_cod FROM presupuestos WHERE pre_cod=$pre_cod");
            $rw_veh = mysqli_fetch_array($sql_veh);
            $veh_cod = $rw_veh['veh_cod'];

            //capturar el vehiculo y setearlo a estado anterior/diagnostico
            $update = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado = 'DIAGNOSTICADO' WHERE veh_cod=$veh_cod");

            if($query && $update){
                header("Location: ../../main.php?module=presupuestos&alert=3");
            } else {
                header("Location: ../../main.php?module=presupuestos&alert=4");
            }
        }
    }
}
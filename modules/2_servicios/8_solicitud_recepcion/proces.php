<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['usu_nombre']) && empty($_SESSION['usu_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){//cambiar act en form
        if(isset($_POST['Guardar'])){

            
            $sse_cod = $_POST['sse_cod'];
            
            //Insertar detalle de servicio
            $sql=mysqli_query($mysqli, "SELECT * FROM items it, tmp_items tmp WHERE it.ite_cod=tmp.ite_cod");
            
            while($row = mysqli_fetch_array($sql)){
                $ite_cod= $row['ite_cod'];
                $precio= $row['precio_tmp'];
                $cantidad= $row['cantidad_tmp'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_servicio (sse_cod, ite_cod, dss_cant, dss_precio) 
                                                         VALUES ($sse_cod, $ite_cod, $cantidad, $precio)")
                                        or die('Error 22'.mysqli_error($mysqli));
                
            }
            

            //traer los datos
            $sse_fecha = $_POST['sse_fecha'];
            $sse_estado='ACTIVO';
            $suc_cod = $_POST['suc_cod'];
            $emp_cod = $_POST['emp_cod'];
            $cli_cod = $_POST['cli_cod'];
            $veh_cod = $_POST['veh_cod'];
            $obs = strtoupper($_POST['obs']);

            //insertar 
            $query = mysqli_query($mysqli, "INSERT INTO solicitud_servicio (sse_cod, sse_fecha, sse_estado, emp_cod, suc_cod, cli_cod, veh_cod,obs)
                                            VALUES ($sse_cod, '$sse_fecha', '$sse_estado', $emp_cod, $suc_cod, $cli_cod, $veh_cod,'$obs')")
                                            or die('Error'.mysqli_error($mysqli));
            
            //update estado de vehiculo
            $veh_estado='SOLICITUD';
            $query = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado = '$veh_estado'
                                            WHERE veh_cod = $veh_cod")
                                            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=solicitud_recepcion&alert=1");
            } else {
                header("Location: ../../main.php?module=solicitud_recepcion&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['sse_cod'])){
            $codigo = $_GET['sse_cod'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE solicitud_servicio SET sse_estado='ANULADO' WHERE sse_cod=$codigo")
            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=solicitud_recepcion&alert=2");
            } else {
                header("Location: ../../main.php?module=solicitud_recepcion&alert=3");
            }
        }
    } 
    
    elseif($_GET['act']=='edit'){
        if(isset($_POST['Guardar'])){
            if(isset($_POST['sse_cod'])){

                $sse_cod = $_POST['sse_cod'];


                $sql = mysqli_query($mysqli, "DELETE FROM detalle_servicio WHERE sse_cod=$sse_cod")
                                                or die('Error 80: '.mysqli_error($mysqli));

                $sql_=mysqli_query($mysqli, "SELECT * FROM items it, tmp_items tmp WHERE it.ite_cod=tmp.ite_cod");

                while($row_ = mysqli_fetch_array($sql_)){
                    $ite_cod= $row_['ite_cod'];
                    $precio= $row_['precio_tmp'];
                    $cantidad= $row_['cantidad_tmp'];
                    $insert_detalle_ = mysqli_query($mysqli, 
                                    "INSERT INTO detalle_servicio (sse_cod, ite_cod, dss_cant, dss_precio) 
                                    VALUES ($sse_cod, $ite_cod, $cantidad, $precio)")
                                    or die('Error 109'.mysqli_error($mysqli));
                    
                }

                $sse_fecha = $_POST['sse_fecha'];
                $sse_estado='ACTIVO';
                $suc_cod = $_POST['suc_cod'];
                $emp_cod = $_POST['emp_cod'];
                $cli_cod = $_POST['cli_cod'];
                $veh_cod = $_POST['veh_cod'];
                $obs = strtoupper($_POST['obs']);
                //Anular cabecera de compra (cambiar estado a anulado)
                $query = mysqli_query($mysqli, "UPDATE solicitud_servicio SET sse_fecha='$sse_fecha',
                                                                        sse_estado = '$sse_estado',
                                                                        suc_cod = $suc_cod,
                                                                        emp_cod = $emp_cod,
                                                                        cli_cod = $cli_cod,
                                                                        veh_cod = $veh_cod,
                                                                        obs = '$obs'  
                                                WHERE sse_cod=$sse_cod")
                                                or die('Error 61: '.mysqli_error($mysqli));

                if($query){
                    header("Location: ../../main.php?module=solicitud_recepcion&alert=3");
                } else {
                    header("Location: ../../main.php?module=solicitud_recepcion&alert=4");
                }
            }
        }
    } 
}
?>

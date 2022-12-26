<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['usu_nombre']) && empty($_SESSION['usu_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){//cambiar act en form
        if(isset($_POST['Guardar'])){
            $codigo = $_POST['codigo'];

            //Insertar detalle de orden_trabajo
            $sql_item = mysqli_query($mysqli, "SELECT * FROM items it, tmp_os tmp WHERE it.cod_item=tmp.cod_item ");

            while($row_item = mysqli_fetch_array($sql_item)){
                $cod_item = $row_item['cod_item'];
                $cantidad_tmp = $row_item['cantidad_tmp'];

                $insert_detalle = mysqli_query($mysqli, "INSERT INTO det_servicio (cod_servicio, cod_item, cantidad) 
                                                        VALUES ($codigo, $cod_item, $cantidad_tmp)")
                                                        or die('Error'.mysqli_error($mysqli));
                
               
                $actualizar_stock = mysqli_query($mysqli, "UPDATE stock set cantidad = cantidad - $cantidad_tmp
                                                            WHERE cod_item = $cod_item AND cod_deposito=1")
                                                            or die('Error'.mysqli_error($mysqli));
            }

            //Insertar cabecera de entrada
            //Definir variables
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado='terminado';
            $codigo_ot = $_POST['codigo_ot'];

            //Insertar en det_servicio_funcionario
            $sql_fun = mysqli_query($mysqli, "SELECT * FROM funcionarios WHERE cod_funcionario = (
                                                        SELECT cod_funcionario FROM orden_trabajo WHERE cod_orden_trabajo = $codigo_ot)");

            while($data_func = mysqli_fetch_array($sql_fun)){
                $cod_funcionario = $data_func['cod_funcionario'];

                $insert_det_fun = mysqli_query($mysqli, "INSERT INTO det_servicio_funcionario (cod_orden_servicio, cod_funcionario) 
                                                        VALUES ($codigo, $cod_funcionario)")
                                                        or die('Error 45: '.mysqli_error($mysqli));
            }


            //insertar 
            $query = mysqli_query($mysqli, "INSERT INTO orden_servicios (cod_orden_servicio, fecha, hora, cod_orden_trabajo, estado)
                                            VALUES ($codigo, '$fecha', '$hora', $codigo_ot, '$estado')")
                                            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=orden_servicios&alert=1");
            } else {
                header("Location: ../../main.php?module=orden_servicios&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['cod_orden_servicio'])){
            $codigo = $_GET['cod_orden_servicio'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE orden_servicios SET estado='anulado' WHERE cod_orden_servicio=$codigo")
            or die('Error'.mysqli_error($mysqli));

            //Consultar detalle de servicio con el código que llegó por get
            $sql = mysqli_query($mysqli, "SELECT * FROM det_servicio WHERE cod_servicio=$codigo");
            while($row = mysqli_fetch_array($sql)){
                $cod_item = $row['cod_item'];
                $cantidad = $row['cantidad'];
                $codigo_deposito = 1;

                $actualizar_stock = mysqli_query($mysqli, "UPDATE stock set cantidad = cantidad + $cantidad
                WHERE cod_item=$cod_item
                AND cod_deposito=$codigo_deposito")
                or die('Error'.mysqli_error($mysqli));
            }

            if($query){
                header("Location: ../../main.php?module=orden_servicios&alert=2");
            } else {
                header("Location: ../../main.php?module=orden_servicios&alert=3");
            }
        }
    } 
}
?>

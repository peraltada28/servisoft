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
            $sql_item = mysqli_query($mysqli, "SELECT * FROM items it, tmp_ot tmp WHERE it.cod_item=tmp.cod_item ");

            while($row_item = mysqli_fetch_array($sql_item)){
                $cod_item = $row_item['cod_item'];
                $cantidad_tmp = $row_item['cantidad_tmp'];

                $insert_detalle = mysqli_query($mysqli, "INSERT INTO det_orden_trabajo (cod_orden_trabajo, cod_item, cantidad) 
                                                        VALUES ($codigo, $cod_item, $cantidad_tmp)")
                                                        or die('Error 21: '.mysqli_error($mysqli));

                
               
                /*$actualizar_stock = mysqli_query($mysqli, "UPDATE stock set cantidad = cantidad - $cantidad_tmp
                                                            WHERE cod_item = $cod_item AND cod_deposito=1")
                                                            or die('Error 27: '.mysqli_error($mysqli));
                */
            }

            //Insertar cabecera de entrada
            //Definir variables
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado='para servicio';
            $funcionario = $_POST['codigo_funcionario'];
            $codigo_diagnostico = $_POST['codigo_diagnostico'];

            //------------------------------------------
            //actualizar el estado de la entrada
            $sql_upd_ent = mysqli_query($mysqli, "UPDATE diagnosticos SET estado='orden de trabajo realizado' 
                                                    WHERE cod_diagnostico = $codigo_diagnostico")
                                                    or die('Error 42: '.mysqli_error($mysqli));
            //-------------------------------------------

            //insertar 
            $query = mysqli_query($mysqli, "INSERT INTO orden_trabajo (cod_orden_trabajo, fecha, hora, cod_funcionario, cod_diagnostico, estado)
                                            VALUES ($codigo, '$fecha', '$hora', $funcionario, $codigo_diagnostico, '$estado')")
                                            or die('Error 48: '.mysqli_error($mysqli));

        
            if($query){
                header("Location: ../../main.php?module=orden_trabajos&alert=1");
            } else {
                header("Location: ../../main.php?module=orden_trabajos&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['cod_orden_trabajo'])){
            $codigo = $_GET['cod_orden_trabajo'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE orden_trabajo SET estado='anulado' WHERE cod_orden_trabajo=$codigo")
            or die('Error'.mysqli_error($mysqli));

            //Consultar detalle de compra con el código que llegó por get
            $sql = mysqli_query($mysqli, "SELECT * FROM abastecimientos WHERE cod_entrada=$codigo");
            while($row = mysqli_fetch_array($sql)){
                $cod_item = $row['cod_item'];
                $cantidad = $row['cant_litros'];
                $codigo_deposito = 1;

                /*$actualizar_stock = mysqli_query($mysqli, "UPDATE stock set cantidad = cantidad - $cantidad
                WHERE cod_item=$cod_item
                AND cod_deposito=$codigo_deposito")
                or die('Error'.mysqli_error($mysqli));
                */
            }

            //actualizar el estado de la entrada
            $sql_upd_ent = mysqli_query($mysqli, "UPDATE diagnosticos SET estado='para orden de trabajo' 
                                                    WHERE cod_diagnostico = (SELECT cod_diagnostico FROM orden_trabajo WHERE cod_orden_trabajo = $codigo)")
                                                    or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=orden_trabajos&alert=2");
            } else {
                header("Location: ../../main.php?module=orden_trabajos&alert=3");
            }
        }
    } 
}
?>
